<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Prospect;

class ActivityController extends Controller
{
    /**
     * @param null $filter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($filter = null)
    {
        return view('activity.index', compact('filter'));
    }
}
