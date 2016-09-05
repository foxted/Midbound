<?php

namespace Midbound\Observers;

use Midbound\Prospect;

/**
 * Class ProspectObserver
 * @package Midbound
 */
class ProspectObserver
{
    /**
     * @param Prospect $prospect
     */
    public function creating(Prospect $prospect)
    {
        if(auth()->check() && auth()->user()->currentTeam()) {
            $prospect->team()->associate(auth()->user()->currentTeam()->id);
        }
    }
}