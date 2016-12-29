<?php

namespace Midbound\Traits\Search;

use Laravel\Scout\Searchable as ScoutSearchable;
use Midbound\Exceptions\InvalidTransformer;

/**
 * Trait Searchable
 * @package Labs\Traits\Search
 */
trait Searchable
{
    use ScoutSearchable, SearchTransformerResponse;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        $model = (new \ReflectionClass($this))->getShortName();

        return strtolower($model);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $data = $this->itemResponse($this->getTransformer(), $this);

        return $data['data'];
    }

    /**
     * Compute the transformer to be used
     */
    protected function getTransformer()
    {
        $model = (new \ReflectionClass($this))->getShortName();
        $transformerClass = "Midbound\\Transformers\\Search\\{$model}Transformer";

        if(!class_exists($transformerClass)) {
            throw new InvalidTransformer("Invalid transformer {$transformerClass}");
        }

        return new $transformerClass;
    }
}