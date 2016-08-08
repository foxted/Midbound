<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;
use Midbound\VisitorEvent;

/**
 * Class VisitorEventsController
 * @package Midbound\Http\Controllers\API
 */
class VisitorEventsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $events = VisitorEvent::currentTeam()->latest()->paginate(25);

        return response()->json($events);
    }
}
