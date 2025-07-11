<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatService
{
    public function getOtherUsersWithUnreadCounts()
    {
        $authId = Auth::id();

        return User::where('id', '!=', $authId)->get()->map(function ($user) use ($authId) {
            $user->unread_count = ChatMessages::where('sender_id', $user->id)
                ->where('receiver_id', $authId)
                ->where('is_read', false)
                ->count();

            return $user;
        });
    }

    public function getConversationWith(User $user)
    {
        $authId = Auth::id();

        // Mark messages as read
        ChatMessages::where('sender_id', $user->id)
            ->where('receiver_id', $authId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return ChatMessages::with(['sender', 'receiver'])
            ->whereIn('sender_id', [$authId, $user->id])
            ->whereIn('receiver_id', [$authId, $user->id])
            ->get();
    }

    public function sendMessageTo(User $user, string $text)
    {
        return ChatMessages::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'text' => $text,
            'is_read' => false,
        ]);
    }
}
