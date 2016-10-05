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
        return 'midbound';
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
     * @return mixed
     */
    public function getSearchableKey()
    {
        return $this->objectID;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getReverseSearchableKey($key)
    {
        return (int) str_replace("{$this->getResourceName()}-", '', $key);
    }

    /**
     * @return string
     */
    public function getObjectIDAttribute()
    {
        return "{$this->getResourceName()}-{$this->getKey()}";
    }

    /**
     * @return string
     */
    public function getResourceName()
    {
        $model = (new \ReflectionClass($this))->getShortName();

        return strtolower($model);
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