<?php

namespace Midbound\Observers;

use Hashids\Hashids;
use Midbound\Prospect;
use Midbound\ProspectProfile;

/**
 * Class ProspectObserver
 * @package Midbound
 */
class ProspectObserver
{
    /**
     * @var Hashids
     */
    protected $hashids;

    /**
     * WebsiteObserver constructor.
     * @param Hashids $hashids
     */
    public function __construct(Hashids $hashids)
    {
        $this->hashids = $hashids;
    }

    /**
     * @param Prospect $prospect
     */
    public function created(Prospect $prospect)
    {
        $prospect->pid = $this->hashids->encode($prospect->id);
        $prospect->save();

        $profile = new ProspectProfile();
        $profile->prospect()->associate($prospect);
        $profile->save();
    }
}