<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Traits\Belonging\BelongsToTeam;

/**
 * Class Website
 * @property mixed id
 * @property string hash
 * @package Midbound
 */
class Website extends Model
{

    use BelongsToTeam;

    /**
     * @var array
     */
    protected $fillable = ['url', 'hash'];

    /**
     * @var array
     */
    protected $appends = ['snippet'];

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
        return $this->hasManyThrough(VisitorEvent::class, Visitor::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSnippetAttribute()
    {
        return view('websites.snippet', ['website' => $this])->render();
    }

    /**
     * @return string
     */
    public function getInstallUrlAttribute()
    {
        return route('app.websites.install');
    }

    /**
     * @return string
     */
    public function getResourceUrlAttribute()
    {
        return route('websites.show', $this);
    }
}
