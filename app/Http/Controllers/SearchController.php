<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Midbound\Http\Requests;

class SearchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('search.index');
    }
}
