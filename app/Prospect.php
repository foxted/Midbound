<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prospect
 * @property string pid
 * @property mixed id
 * @package Midbound
 */
class Prospect extends Model
{
    /**
     * @var array
     */
    protected $appends = ['url', 'avatar'];

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('app.prospects.show', $this->pid);
    }

    /**
     * @return string
     */
    public function getAvatarAttribute()
    {
        $hash = md5($this->email);
        return "//www.gravatar.com/avatar/{$hash}?s=250";
    }

    /**
     * @return mixed
     */
    public function getLatestEventAttribute()
    {
        return $this->events()->latest()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function events()
    {
        return $this->hasManyThrough(VisitorEvent::class, Visitor::class);
    }

    /**
     * @return mixed
     */
    public function getLatestActivityAttribute()
    {
        return $this->latestEvent->created_at;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function informations()
    {
        return $this->hasOne(ProspectInformation::class);
    }

}
