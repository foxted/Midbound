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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $prospects = $this->getProspects($request);

        return response()->json($prospects);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getProspects(Request $request)
    {
        if($request->has('filter')) {
            if($request->get('filter') == 'my-prospects') {
                return Prospect::has('events')->assignedTo(auth()->user())->paginate(25);
            }
            if($request->get('filter') == 'ignored') {
                return Prospect::has('events')->ignored()->paginate(25);
            }
        }

        return Prospect::has('events')->active()->paginate(25);
    }
}
