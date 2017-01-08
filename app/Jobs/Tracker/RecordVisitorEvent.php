<?php

namespace Midbound\Jobs\Tracker;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Midbound\Events\Tracker\VisitorEventWasTriggered;
use Midbound\Jobs\Job;
use Midbound\Prospect;
use Midbound\Visitor;
use Midbound\VisitorEvent;
use Midbound\Website;

/**
 * Class RecordVisitorEvent
 * @package Midbound\Jobs
 */
class RecordVisitorEvent extends Job implements ShouldQueue
{

    use InteractsWithQueue, SerializesModels;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var Website
     */
    protected $website;

    /**
     * @var Visitor
     */
    protected $visitor;

    /**
     * Create a new job instance.
     * @param Website $website
     * @param Visitor $visitor
     * @param array $attributes
     */
    public function __construct(Website $website, Visitor $visitor, array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->website = $website;
        $this->visitor = $visitor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (in_array($this->attributes['midac'], config('tracking.allowed-events'))) {
            $event = new VisitorEvent([
                'action' => $this->attributes['midac'],
                'url' => $this->attributes['midurl'],
                'resource' => $this->attributes['midrc'],
                'ip_address' => request()->ip()
            ]);
            $event->visitor()->associate($this->visitor);
            $event->team()->associate($this->visitor->team);
            $event->save();

            event(new VisitorEventWasTriggered($event));
        }
    }
}
