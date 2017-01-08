<?php

namespace Midbound\Events\Tracker;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Midbound\VisitorEvent;

class VisitorEventWasTriggered
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var VisitorEvent
     */
    public $visitorEvent;

    /**
     * Create a new event instance.
     * @param VisitorEvent $visitorEvent
     */
    public function __construct(VisitorEvent $visitorEvent)
    {
        $this->visitorEvent = $visitorEvent;
    }
}
