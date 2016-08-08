<?php

namespace Midbound\Observers;

use Vinkla\Hashids\Facades\Hashids;
use Midbound\Website;

/**
 * Class WebsiteObserver
 * @package Midbound
 */
class WebsiteObserver
{
    /**
     * @param Website $website
     */
    public function creating(Website $website)
    {
        $website->team()->associate(auth()->user()->currentTeam()->id);
    }

    /**
     * @param Website $website
     */
    public function created(Website $website)
    {
        $hash = Hashids::connection('websites')->encode($website->id);
        $website->hash = "MB-{$hash}-{$website->team->id}";
        $website->save();
    }
}