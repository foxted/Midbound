<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;
use Midbound\Scopes\TeamScope;

/**
 * Class VisitorEvent
 * @package Midbound
 */
class VisitorEvent extends Model
{

    use TeamScope;

    /**
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at' => 'date',
    ];

    /**
     * @var array
     */
    protected $appends = ['prospect'];

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

    /**
     * @return mixed
     */
    public function getProspectAttribute()
    {
        return $this->visitor->prospect;
    }
}
