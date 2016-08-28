<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;
use Midbound\Http\Requests;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;
use Midbound\VisitorEvent;

/**
 * Class ActivityController
 * @package Midbound\Http\Controllers\API
 */
class ActivityController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $activity = VisitorEvent::currentTeam()->latest()->paginate(25);

//        $activity->setCollection($activity->getCollection()->groupBy('action'));

        dd($activity->toArray());

        return response()->json($activity);
    }
}
