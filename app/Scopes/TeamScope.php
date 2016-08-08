<?php

namespace Midbound\Scopes;

/**
 * Trait TeamScope
 * @package Midbound\Scopes
 */
trait TeamScope
{
    /**
     * @param $query
     * @param Team $team
     * @return mixed
     */
    public function scopeTeam($query, Team $team)
    {
        return $query->whereTeamId($team->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCurrentTeam($query)
    {
        return $query->whereTeamId(auth()->user()->currentTeam()->id);
    }
}