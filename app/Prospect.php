<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Traits\Belonging\BelongsToTeam;

/**
 * Class Prospect
 * @property mixed id
 * @property mixed captured
 * @package Midbound
 */
class Prospect extends Model
{

    use BelongsToTeam;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'is_ignored'];

    /**
     * @var array
     */
    protected $appends = ['url', 'avatar', 'latest_event', 'latest_activity'];

    /**
     * @var array
     */
    protected $with = ['visitors', 'events'];

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
     * @return VisitorEvent
     */
    public function getLatestEventAttribute()
    {
        return $this->events()->first();
    }

    /**
     * @return mixed
     */
    public function getLatestActivityAttribute()
    {
        if(is_null($this->latestEvent)) {
            return null;
        }

        return $this->latestEvent->created_at;
    }

    /**
     * @param string $type
     * @param string $value
     * @return $this
     */
    public function capture(string $type, string $value)
    {
        $type = str_singular($type);

        if(in_array($type, config('tracking.allowed-fields'))) {
            if(!$this->{$type}) {
                $this->{$type} = strtolower($value);
            }
        }

        return $this;
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function events()
    {
        return $this->hasManyThrough(
            'Midbound\VisitorEvent', 'Midbound\Visitor',
            'prospect_id', 'visitor_id', 'id'
        );
    }

    /**
     * @param $query
     * @param User $user
     * @return mixed
     */
    public function scopeAssignedTo($query, User $user)
    {
        return $query->where('assignee_id', $user->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_ignored', 0);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIgnored($query)
    {
        return $query->where('is_ignored', 1);
    }

}
