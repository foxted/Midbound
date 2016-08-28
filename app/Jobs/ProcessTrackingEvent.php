<?php

namespace Midbound\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Midbound\Prospect;
use Midbound\VisitorEvent;
use Midbound\Website;

/**
 * Class ProcessTrackingEvent
 * @package Midbound\Jobs
 */
class ProcessTrackingEvent extends Job implements ShouldQueue
{

    use InteractsWithQueue, SerializesModels;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * Create a new job instance.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Fetch tracker record
        $website = $this->website();

        // Fetch or create visitor record
        $visitor = $this->visitor($website);

        // Check for capture
        $this->captureData($visitor);

        // Record event
        $this->recordVisitorEvent($visitor);
    }

    /**
     * Fetch the website tracking property
     * @return mixed
     */
    private function website()
    {
        return Website::whereHash($this->attributes['midid'])->first();
    }

    /**
     * Fetch the visitor record or create it
     * @param $website
     * @return mixed
     */
    private function visitor($website)
    {
        return $website->visitors()->firstOrCreate([
            'team_id' => $website->team->id,
            'website_id' => $website->id,
            'guid' => $this->attributes['midguid']
        ]);
    }

    /**
     * Capture visitor data if there is any
     * @param $visitor
     */
    private function captureData($visitor)
    {
        if ($this->attributes['midac'] == "capture") {
            if (!$prospect = $visitor->prospect) {
                $prospect = Prospect::create();
                $visitor->prospect()->associate($prospect);
                $visitor->save();
            }

            $profile = $prospect->profile;
            $profile->capture($this->attributes['midtype'], $this->attributes['midrc']);
            $profile->save();
        }
    }

    /**
     * Record visitor event in storage
     * @param $visitor
     */
    private function recordVisitorEvent($visitor)
    {
        if (in_array($this->attributes['midac'], config('tracking.allowed-events'))) {
            $event = new VisitorEvent([
                'action' => $this->attributes['midac'],
                'url' => $this->attributes['midurl'],
                'resource' => $this->attributes['midrc']
            ]);
            $event->visitor()->associate($visitor);
            $event->team()->associate($visitor->team);
            $event->save();
        }
    }
}
