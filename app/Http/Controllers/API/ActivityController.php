<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;

/**
 * Class ActivityController
 * @package Midbound\Http\Controllers\API
 */
class ActivityController extends Controller
{
    /**
     * @param Request $request
     * @param $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $filter = null)
    {
        $prospects = $this->getProspects($request, $filter);

        return response()->json($prospects);
    }

    /**
     * @param Request $request
     * @param $filter
     * @return mixed
     */
    public function getProspects(Request $request, $filter)
    {
        if($filter) {
            if($filter == 'prospects') {
                return Prospect::has('events')->assignedTo(auth()->user())->paginate(25);
            }
            if($filter == 'ignored') {
                return Prospect::has('events')->ignored()->paginate(25);
            }
        }

        return Prospect::has('events')->active()->paginate(25);
    }
}
