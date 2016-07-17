<?php

namespace Midbound\Http\Controllers;

/**
 * Class WelcomeController
 * @package Midbound\Http\Controllers
 */
class ExternalPagesController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function home()
    {
        return view('external.home');
    }

     public function styles()
    {
        return view('external.styles');
    }
}
