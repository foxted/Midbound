<?php

namespace Midbound\Jobs\Tracker;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Midbound\Jobs\Job;
use Midbound\Prospect;
use Midbound\Visitor;
use Midbound\VisitorEvent;
use Midbound\Website;

/**
 * Class CaptureData
 * @package Midbound\Jobs
 */
class CaptureData extends Job implements ShouldQueue
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
        // Fetch the data needed
        $this->prospect = $this->resolveProspect();

        if ($this->attributes['midac'] !== "capture") {
            return false;
        }

        $this->prospect->capture(
            $this->attributes['midtype'],
            $this->attributes['midrc']
        )->save();
    }

    /**
     * @return Prospect
     */
    private function resolveProspect()
    {
        if ($this->visitor->prospect) {
            return $this->visitor->prospect;
        }

        $prospect = $this->attributes['midtype'] == 'email'
            ? Prospect::firstOrNew(['email' => $this->attributes['midrc']])
            : new Prospect();

        $prospect->team()->associate($this->visitor->team);

        $this->visitor->prospect()->associate($prospect);
        $this->visitor->save();

        return $prospect;
    }
}
