<?php

namespace App\Http\Controllers;

/**
 * Class DashboardController
 * @package App\Http\Controllers
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
