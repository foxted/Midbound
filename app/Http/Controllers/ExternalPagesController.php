<?php

namespace App\Http\Controllers;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
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
