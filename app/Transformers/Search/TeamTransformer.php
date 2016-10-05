<?php

namespace Midbound\Transformers\Search;

use League\Fractal\TransformerAbstract;
use Midbound\Team;

/**
 * Class TeamTransformer
 * @package Midbound\Transformers\Search
 */
class TeamTransformer extends TransformerAbstract
{
    /**
     * @param Team $team
     * @return array
     */
    public function transform(Team $team)
    {
        return $team->toArray();
    }
}