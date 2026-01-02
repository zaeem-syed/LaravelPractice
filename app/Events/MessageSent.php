<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_name;
    public $message;

    public function __construct($user_name, $message)
    {
        $this->user_name = $user_name;
        $this->message = $message; // string only
    }

    public function broadcastOn()
    {
        return ['chat-channel']; // public channel
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }

    public function broadcastWith()
    {
        return [
            'user_name' => $this->user_name,
            'message' => $this->message
        ];
    }
}
