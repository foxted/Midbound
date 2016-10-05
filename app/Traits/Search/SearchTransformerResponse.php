<?php

namespace Midbound\Traits\Search;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\TransformerAbstract;

/**
 * Trait SearchTransformerResponse
 * @package Midbound\Traits\Search
 */
trait SearchTransformerResponse
{

    /**
     * Return a transformed item
     * @param TransformerAbstract $transformer
     * @param Model $data
     * @return string
     */
    public function itemResponse(TransformerAbstract $transformer, Model $data)
    {
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());

        if (property_exists($this, 'request') && $this->request->has('include')) {
            $manager->parseIncludes($this->request->get('include'));
        }

        $item = new Fractal\Resource\Item($data, $transformer);

        return $manager->createData($item)->toArray();
    }

    /**
     * Return a transformed collection
     * @param TransformerAbstract $transformer
     * @param Collection $data
     * @return string
     */
    public function collectionResponse(TransformerAbstract $transformer, $data)
    {
        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer())->parseIncludes(['memberships']);

        if (property_exists($this, 'request') && $this->request->has('include')) {
            $manager->parseIncludes($this->request->get('include'));
        }

        if ($data instanceof LengthAwarePaginator) {
            $collection = new Fractal\Resource\Collection($data->getCollection(), $transformer);
            $collection->setPaginator(new Fractal\Pagination\IlluminatePaginatorAdapter($data));
        } else {
            $collection = new Fractal\Resource\Collection($data, $transformer);
        }

        return $manager->createData($collection)->toArray();
    }

}