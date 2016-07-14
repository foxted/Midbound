<?php

namespace Midbound\Observers;

use Hashids;
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
    public function created(Prospect $prospect)
    {
        $prospect->pid = Hashids::encode($prospect->id);
        $prospect->save();
    }
}