<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visitor
 * @package Midbound
 */
class Visitor extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['guid', 'team_id', 'website_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(VisitorEvent::class);
    }
}
