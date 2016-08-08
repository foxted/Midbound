<?php

namespace Midbound\Observers;

use Midbound\VisitorEvent;

/**
 * Class VisitorEventObserver
 * @package Midbound
 */
class VisitorEventObserver
{
    /**
     * @param VisitorEvent $event
     */
    public function creating(VisitorEvent $event)
    {
        $event->team()->associate(auth()->user()->currentTeam()->id);
    }
}