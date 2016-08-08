<?php

namespace Midbound;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProspectProfile
 * @package Midbound
 */
class ProspectProfile extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
