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
        'emails' => 'array',
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
     * @param string $type
     * @param string $value
     * @return $this
     */
    public function capture(string $type, string $value = '')
    {
        $type = str_plural(strtolower($type));
        $value = strtolower($value);

        if(empty($value) || !$this->isValidDataType($type)) {
            return $this;
        }

        $tmp = $this->{$type} ?? [];

        if(!in_array($value, $tmp, true)){
            array_push($tmp, $value);
        }

        $this->{$type} = $tmp;

        return $this;
    }

    /**
     * @param $type
     * @return bool
     */
    private function isValidDataType($type)
    {
        return array_key_exists($type, $this->attributesToArray());
    }
}
