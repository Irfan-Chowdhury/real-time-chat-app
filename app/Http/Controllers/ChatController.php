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

        $users->each(function ($user)  {
            $user->unread_count = ChatMessages::where('sender_id', $user->id)
                ->where('receiver_id', Auth::id())
                ->where('is_read', false)
                ->count();
        });

        return view('chat', compact('user','users'));
    }

    public function index(User $user)
    {
        $messages = ChatMessages::with(['sender', 'receiver'])
            ->whereIn('sender_id', [Auth::id(), $user->id])
            ->whereIn('receiver_id', [Auth::id(), $user->id])
            ->get();

        // Mark all messages from this user as read
        ChatMessages::where('sender_id', $user->id)
            ->where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json($messages);
    }

    public function store(User $user, Request $request)
    {
        $message = ChatMessages::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'text' => $request->message,
            'is_read' => false,
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json($message);
    }
}
