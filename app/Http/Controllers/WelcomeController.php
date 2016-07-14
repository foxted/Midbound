<?php

namespace Midbound\Http\Controllers;

/**
 * Class WelcomeController
 * @package Midbound\Http\Controllers
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
