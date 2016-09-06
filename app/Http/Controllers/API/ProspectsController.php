<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;

/**
 * Class ProspectsController
 * @package Midbound\Http\Controllers\API
 */
class ProspectsController extends Controller
{
    /**
     * @param Request $request
     * @param Prospect $prospect
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Prospect $prospect)
    {
        $prospect->update($request->only('is_ignored'));

        return response()->json($prospect);
    }
}
