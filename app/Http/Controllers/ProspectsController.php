<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Prospect;

class ProspectsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('prospects.index');
    }

    /**
     * @param Prospect $prospect
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Prospect $prospect)
    {
        $events = $prospect->currentTeam()->events()->latest()->get();

        return view('prospects.show', compact('prospect', 'events'));
    }
}
