<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Traits\Belonging\BelongsToTeam;

/**
 * Class Visitor
 * @package Midbound
 */
class Visitor extends Model
{

    use BelongsToTeam;

    /**
     * @var array
     */
    protected $fillable = ['guid', 'team_id', 'website_id'];

    /**
     * @var array
     */
    protected $touches = ['website', 'prospect'];

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
