<?php

namespace Midbound\Http\Controllers;

/**
 * Class DashboardController
 * @package Midbound\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        return view('app.dashboard');
    }
}
