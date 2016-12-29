<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Sequences\URLCleaner\URLCleaner;
use Midbound\Traits\Belonging\BelongsToTeam;

/**
 * Class VisitorEvent
 * @package Midbound
 */
class VisitorEvent extends Model
{

    use BelongsToTeam;

    const TYPE_PAGEVIEW = 'pageview';
    const TYPE_DOWNLOAD = 'download';
    const TYPE_SUBSCRIBE = 'subscribe';
    const TYPE_CLICK = 'click';
    const TYPE_CAPTURE = 'capture';

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at' => 'date',
    ];

    /**
     * @var array
     */
    protected $fillable = ['action', 'url', 'resource'];

    /**
     * @var array
     */
    protected $appends = ['actionVerb', 'cleanUrl'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    /**
     * @return mixed
     */
    public function getProspectAttribute()
    {
        return $this->visitor->prospect;
    }

    /**
     * @return mixed
     */
    public function getActionVerbAttribute()
    {
        if (array_key_exists($this->action, config('tracking.verbs'))) {
            return config("tracking.verbs.{$this->action}");
        }

        return $this->action;
    }

    /**
     * @TODO Remove only the _utm query params
     * @return string
     */
    public function getCleanUrlAttribute()
    {
        return (new URLCleaner)->clean($this->url);
    }

    /**
     * @return bool
     */
    public function isPageview()
    {
        return $this->action === self::TYPE_PAGEVIEW;
    }

    /**
     * @return bool
     */
    public function isCapture()
    {
        return $this->action === self::TYPE_CAPTURE;
    }
}
