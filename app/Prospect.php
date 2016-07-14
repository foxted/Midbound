<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prospect
 * @package Midbound
 */
class Prospect extends Model
{
    /**
     * @var array
     */
    protected $appends = ['url', 'avatar', 'latest_activity'];

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
    public function getLatestActivityAttribute()
    {
        return $this->created_at;
    }
}
