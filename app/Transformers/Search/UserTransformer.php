<?php

namespace Midbound\Transformers\Search;

use League\Fractal\TransformerAbstract;
use Midbound\Prospect;
use Midbound\User;

/**
 * Class UserTransformer
 * @package Midbound\Transformers\Search
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return $user->toArray();
    }
}