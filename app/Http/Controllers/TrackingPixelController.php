<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Midbound\Http\Requests;

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
        $image = file_get_contents(public_path('img/pixel.gif'));

        logger('Tracking: '.implode(', ', $request->all()));

        return response($image, Response::HTTP_OK, [
            'Content-Type' => 'image/gif'
        ]);
    }
}
