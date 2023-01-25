<?php

namespace App\Events;

use App\Models\Pickup;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PickupCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Pickup
     */
    public $pickup;

    /**
     * Create a new event instance.
     *
     * @param Pickup $pickup
     */
    public function __construct(Pickup $pickup)
    {
        $this->pickup = $pickup;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
