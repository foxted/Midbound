<?php

namespace Midbound\Bindings;

use Midbound\Prospect;

/**
 * Class ProspectBinding
 * @package Midbound\Bindings
 */
class ProspectBinding
{
    /**
     * @param string $prospectId
     * @return mixed
     */
    public function bind(string $prospectId)
    {
        return Prospect::findOrFail($prospectId);
    }
}
