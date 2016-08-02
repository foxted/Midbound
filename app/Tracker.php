<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracker
 * @package Midbound
 */
class Tracker extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }
}
