<?php

namespace Midbound\Http\Controllers;

use Midbound\Website;

/**
 * Class InstallWebsiteController
 * @package Midbound\Http\Controllers
 */
class InstallWebsiteController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $website = Website::currentTeam()->first();

        return view('websites.install-website', compact('website'));
    }
}
