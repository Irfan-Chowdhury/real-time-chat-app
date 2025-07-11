<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function viewPage(User $user, ChatService $chatService)
    {
        $users = $chatService->getOtherUsersWithUnreadCounts();

        return view('chat', compact('user', 'users'));
    }

    public function index(User $user, ChatService $chatService)
    {
        $messages = $chatService->getConversationWith($user);

        return response()->json($messages);
    }

    public function store(User $user, Request $request, ChatService $chatService)
    {
        $message = $chatService->sendMessageTo($user, $request->message);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json($message);
    }
}
