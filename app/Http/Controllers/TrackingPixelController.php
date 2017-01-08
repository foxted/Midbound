<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Midbound\Jobs\ProcessTrackingEvent;
use Midbound\Jobs\Tracker\CaptureData;
use Midbound\Jobs\Tracker\RecordVisitorEvent;
use Midbound\Website;

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
//        try {
            $this->processingEvent($request);
//        } catch (Exception $e) {
//            logger($e->getMessage());
//        } finally {
//            return $this->returnResponseImage();
//        }
    }

    /**
     * @param Request $request
     */
    private function processingEvent(Request $request)
    {
        $website = Website::whereHash($request->get('midid'))->first();
        $visitor = $website->visitors()->firstOrCreate([
            'team_id' => $website->team->id,
            'website_id' => $website->id,
            'guid' => $request->get('midguid')
        ]);

        dispatch(new CaptureData($website, $visitor, $request->only(
            'midid', 'midguid', 'midac', 'midrc', 'midtype', 'midurl'
        )));
        dispatch(new RecordVisitorEvent($website, $visitor, $request->only(
            'midid', 'midguid', 'midac', 'midrc', 'midtype', 'midurl'
        )));
    }

    /**
     * @return Response
     */
    private function returnResponseImage(): Response
    {
        $image = file_get_contents(public_path('img/pixel.gif'));

        return response($image, Response::HTTP_OK, [
            'Content-Type' => 'image/gif'
        ]);
    }
}
