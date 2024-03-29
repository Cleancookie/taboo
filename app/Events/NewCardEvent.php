<?php

namespace App\Events;

use App\Models\Room;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCardEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public Room $room
    )
    {
        //
    }

    public function broadcastOn()
    {
        return new PrivateChannel('Room.' . $this->room->id);
    }

    public function broadcastWith()
    {
        return [
            'room' => $this->room->toArray(),
            'card' => $this->room->card->toArray(),
        ];
    }

}
