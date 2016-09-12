<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Midbound\Jobs\ProcessTrackingEvent;

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
            dispatch(
                new ProcessTrackingEvent($request->only(
                    'midid',
                    'midguid',
                    'midac',
                    'midrc',
                    'midtype',
                    'midurl'
                ))
            );
        } catch (Exception $e) {
            logger($e->getMessage());
        } finally {
            $image = file_get_contents(public_path('img/pixel.gif'));

            return response($image, Response::HTTP_OK, [
                'Content-Type' => 'image/gif'
            ]);
        }
    }
}
