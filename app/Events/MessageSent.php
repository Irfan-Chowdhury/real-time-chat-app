<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\ChatMessages;
use App\Models\User;

// class MessageSent
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     public function __construct()
//     {
//         //
//     }

//     public function broadcastOn(): array
//     {
//         return [
//             new PrivateChannel('channel-name'),
//         ];
//     }
// }


class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $chatMessage;

    public function __construct(User $user, ChatMessages $chatMessage)
    {
        $this->user = $user;
        $this->chatMessage = $chatMessage;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("chat"),
        ];
    }

    public function broadcastWith()
    {
        return ['message' => $this->chatMessage];
    }
}
