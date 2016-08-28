<?php

namespace Midbound;

use Carbon\Carbon;
use Laravel\Spark\Team as SparkTeam;

/**
 * Class Team
 * @package Midbound
 */
class Team extends SparkTeam
{
    /**
     * @return string
     */
    public function getGracePeriodEndDateInDaysFormattedAttribute()
    {
        if($this->subscription()) {
            $endDate = $this->subscription()->ends_at->diffInDays();

            if($endDate > 0)  {
                return sprintf("in %s %s", $endDate, str_plural('day', $endDate));
            }

            return 'today';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getTrialEndDateInDaysFormattedAttribute()
    {
        $endDate = $this->trial_ends_at->diffInDays();

        if($endDate > 0)  {
            return sprintf("in %s %s", $endDate, str_plural('day', $endDate));
        }

        return 'today';
    }
}
