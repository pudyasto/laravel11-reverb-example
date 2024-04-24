<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $channel;
    public $title;
    public $message;
    public $type;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
        $this->channel = 'all';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel($this->channel);
    }
    
    /**
    * The event's broadcast name.
    *
    * @return string
    */
    public function broadcastWith()
    {
        
        return [
            $this->title,
            $this->message,
            $this->type,
        ];
    }

    public function broadcastAs(): string
    {
        return 'testevent.sent';
    }

}
