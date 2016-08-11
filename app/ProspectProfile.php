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
     * @var array
     */
    protected $fillable = ['email', 'name', 'phone', 'company', 'names', 'emails', 'phones', 'companies', 'customs'];

    /**
     * @var array
     */
    protected $casts = [
        'names' => 'array',
        'email' => 'array',
        'phones' => 'array',
        'companies' => 'array',
        'customs' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }

    /**
     * @param $type
     * @param $value
     * @return $this
     */
    public function capture($type, $value)
    {
        $type = str_plural($type);

        if(array_key_exists($type, $this->attributesToArray()) && !is_null($value)) {
            $tmp = $this->{$type} ?? [];
            array_push($tmp, $value);
            $this->{$type} = $tmp;
        }

        return $this;
    }
}
