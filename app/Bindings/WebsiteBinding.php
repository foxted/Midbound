<?php

namespace Midbound\Bindings;

use Midbound\Website;

/**
 * Class WebsiteBinding
 * @package Midbound\Bindings
 */
class WebsiteBinding
{
    /**
     * @param string $websiteId
     * @return mixed
     */
    public function bind(string $websiteId)
    {
        return Website::findOrFail($websiteId);
    }
}
