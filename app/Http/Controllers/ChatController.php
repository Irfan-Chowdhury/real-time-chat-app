<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function viewPage(User $user)
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('chat', compact('user','users'));
    }

    public function index(User $user)
    {
        $messages = ChatMessages::with(['sender', 'receiver'])
            ->whereIn('sender_id', [Auth::id(), $user->id])
            ->whereIn('receiver_id', [Auth::id(), $user->id])
            ->get();

        return response()->json($messages);
    }

    public function store(User $user, Request $request)
    {
        $message = ChatMessages::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'text' => $request->message,
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json($message);
    }
}
