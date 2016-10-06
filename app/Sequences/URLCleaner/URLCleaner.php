<?php

namespace Midbound\Sequences\URLCleaner;

/**
 * Class URLCleaner
 * @package Midbound\Strategies\URLCleaner
 */
class URLCleaner
{
    /**
     * @var array
     */
    protected $sequence = [
        FormatURL::class,
        RemoveUnwantedQueryParams::class,
        RemoveTrailingSlash::class,
    ];

    /**
     * @param string $url
     * @return string
     */
    public function clean(string $url)
    {
        foreach($this->sequence as $step) {
            $url = (new $step)->apply($url);
        }

        return $url;
    }
}