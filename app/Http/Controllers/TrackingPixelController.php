<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Midbound\Prospect;
use Midbound\Website;
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
        try {
            // Fetch tracker record
            $website = Website::whereHash($request->get('midid'))->first();

            // Fetch or create visitor record
            $visitor = $website->visitors()->firstOrCreate([
                'team_id' => $website->team->id,
                'website_id' => $website->id,
                'guid' => $request->get('midguid')
            ]);

            // Check for capture
            if($request->get('midac') == "capture") {
                if(!$prospect = $visitor->prospect) {
                    $prospect = Prospect::create();
                    $visitor->prospect()->associate($prospect);
                    $visitor->save();
                }

                $profile = $prospect->profile;
                $profile->capture($request->get('midtype'), $request->get('midrc'));
                $profile->save();
            }

            // Record event
            if(in_array($request->get('midac'), config('tracking.allowed-events'))) {
                $event = new VisitorEvent([
                    'action' => $request->get('midac'),
                    'url' => $request->get('midurl'),
                    'resource' => $request->get('midrc')
                ]);
                $event->visitor()->associate($visitor);
                $event->team()->associate($visitor->team);
                $event->save();
            }
        } catch(Exception $e) {
            logger($e->getMessage());
        } finally {
            $image = file_get_contents(public_path('img/pixel.gif'));

            return response($image, Response::HTTP_OK, [
                'Content-Type' => 'image/gif'
            ]);
        }
    }
}
