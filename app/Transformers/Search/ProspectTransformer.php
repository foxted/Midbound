<?php

namespace Midbound\Transformers\Search;

use League\Fractal\TransformerAbstract;
use Midbound\Prospect;

/**
 * Class ProspectTransformer
 * @package Midbound\Transformers\Search
 */
class ProspectTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['assignee', 'team'];

    /**
     * @param Prospect $prospect
     * @return array
     */
    public function transform(Prospect $prospect)
    {
        return [
            'objectID' => $prospect->objectID,
            'id' => $prospect->id,
            'name' => $prospect->name,
            'email' => $prospect->email,
            'phone' => $prospect->phone,
            'company' => $prospect->company,
            'is_ignored' => (bool) $prospect->is_ignored,
            'created_at' => $prospect->created_at,
        ];
    }

    /**
     * @param Prospect $prospect
     * @return \League\Fractal\Resource\Item
     */
    public function includeAssignee(Prospect $prospect)
    {
        if(is_null($prospect->assignee)) {
            return;
        }

        return $this->item($prospect->assignee, new UserTransformer);
    }

    /**
     * @param Prospect $prospect
     * @return \League\Fractal\Resource\Item
     */
    public function includeTeam(Prospect $prospect)
    {
        if(is_null($prospect->team)) {
            return;
        }

        return $this->item($prospect->team, new TeamTransformer);
    }
}