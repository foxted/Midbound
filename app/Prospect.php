<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Traits\Belonging\BelongsToTeam;
use Midbound\Traits\Search\Searchable;

/**
 * Class Prospect
 * @property mixed id
 * @property mixed captured
 * @property mixed assignee
 * @property mixed created_at
 * @property mixed is_ignored
 * @property mixed company
 * @property mixed phone
 * @property mixed email
 * @property mixed name
 * @property mixed objectID
 * @property mixed team
 * @package Midbound
 */
class Prospect extends Model
{

    use BelongsToTeam, Searchable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'company', 'is_ignored', 'city', 'state', 'country', 'timezone'];

    /**
     * @var array
     */
    protected $appends = ['url', 'avatar', 'latest_event', 'latest_activity', 'linkedin'];

    /**
     * @var array
     */
    protected $with = ['visitors', 'events', 'assignee'];

    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('app.prospects.show', $this->id);
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
        return $this->events()->latest()->first();
    }

    /**
     * @return mixed
     */
    public function getLatestActivityAttribute()
    {
        if (is_null($this->latestEvent)) {
            return null;
        }

        return $this->latestEvent->created_at;
    }

    /**
     * @param $value
     */
    public function setIsIgnoredAttribute($value)
    {
        $this->attributes['is_ignored'] = (bool) $value;
    }

    /**
     * @param string $type
     * @param string $value
     * @return $this
     */
    public function capture(string $type, string $value)
    {
        $type = str_singular($type);

        if (in_array($type, config('tracking.allowed-fields'))) {
            $this->{$type} = strtolower($value);
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
            'Midbound\VisitorEvent',
            'Midbound\Visitor',
            'prospect_id',
            'visitor_id',
            'id'
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

    /**
     * @return string
     */
    public function getLinkedInAttribute()
    {
        if ($this->name) {
            $query = urlencode($this->name);
            return "https://www.linkedin.com/vsearch/p?type=people&keywords={$query}";
        }

        return '';
    }

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        if(!$value) {
            $email = explode('@', $this->email);
            $fullname = str_replace('.', ' ', $email[0]);

            return ucwords($fullname);
        }

        return $value;
    }
}
