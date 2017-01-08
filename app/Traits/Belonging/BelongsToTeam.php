<?php

namespace Midbound\Traits\Belonging;

use Midbound\Team;

/**
 * Trait BelongsToTeam
 * @package Midbound\Traits\Belonging
 */
trait BelongsToTeam
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @param $query
     * @param Team $team
     * @return mixed
     */
    public function scopeByTeam($query, Team $team)
    {
        return $query->where($this->getTable().'.team_id', $team->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCurrentTeam($query)
    {
        return $query->byTeam(auth()->user()->currentTeam());
    }
}
