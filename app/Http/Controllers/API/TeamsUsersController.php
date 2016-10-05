<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Http\Controllers\Controller;

/**
 * Class TeamsUsersController
 * @package Midbound\Http\Controllers\API
 */
class TeamsUsersController extends Controller
{
    /**
     * @param Team $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Team $team)
    {
        return response()->json($team->users);
    }
}
