<?php

namespace App\Http\Controllers;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        return view('welcome');
    }
}
