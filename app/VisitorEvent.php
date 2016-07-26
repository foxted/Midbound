<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VisitorEvent
 * @package Midbound
 */
class VisitorEvent extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'meta' => 'array'
    ];

    /**
     * @var array
     */
    protected $fillable = ['action', 'resource', 'meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
