<?php

namespace Midbound\Listeners\Tracker;

use Midbound\Events\Tracker\VisitorEventWasTriggered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeolocateFromIpAddress implements ShouldQueue
{
    /**
     * @var VisitorEventWasTriggered
     */
    protected $event;

    /**
     * Create the event listener.
     * @param VisitorEventWasTriggered $event
     */
    public function __construct(VisitorEventWasTriggered $event)
    {
        $this->event = $event;
    }

    /**
     * Handle the event.
     *
     * @param  VisitorEventWasTriggered  $event
     * @return void
     */
    public function handle(VisitorEventWasTriggered $event)
    {
        if(is_null($event->visitorEvent->prospect)) {
            return false;
        }

        if(is_null($event->visitorEvent->ip_address)) {
            return false;
        }

        $location = geoip($event->visitorEvent->ip_address);

        if($location->default) {
            return false;
        }

        $event->visitorEvent->prospect->update([
            'city' => $location->city,
            'state' => $location->state,
            'country' => $location->country,
            'timezone' => $location->timezone,
        ]);
    }
}
