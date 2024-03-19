<?php

namespace App\Events;

use App\Models\API\Member;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Registered event
 *
 * * @author Fuad Bayramli <fuadbayramli94@gmail.com>
 */
class Registered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Member
     */
    public Member $member;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel|array
     */
    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('channel-name');
    }
}
