<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Midbound\Tracker;
use Midbound\VisitorEvent;

/**
 * Class TrackingPixelController
 * @package Midbound\Http\Controllers
 */
class TrackingPixelController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show(Request $request)
    {
        // Fetch tracker record
        $tracker = Tracker::whereHash($request->get('midid'))->first();

        // Fetch or create visitor record
        $visitor = $tracker->visitors()->firstOrCreate([
            'team_id' => $tracker->team->id,
            'tracker_id' => $tracker->id,
            'guid' => $request->get('midguid')
        ]);

        // Record event
        $event = new VisitorEvent([
            'action' => $request->get('midac'),
            'resource' => $request->get('midrc'),
            'meta' => $request->get('midmeta', [])
        ]);
        $event->visitor()->associate($visitor);
        $event->save();

        $image = file_get_contents(public_path('img/pixel.gif'));
        return response($image, Response::HTTP_OK, [
            'Content-Type' => 'image/gif'
        ]);
    }
}
