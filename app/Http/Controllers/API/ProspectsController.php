<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;

/**
 * Class ProspectsController
 * @package Midbound\Http\Controllers\API
 */
class ProspectsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $prospects = Prospect::latest()->get();

        return response()->json($prospects);
    }
}
