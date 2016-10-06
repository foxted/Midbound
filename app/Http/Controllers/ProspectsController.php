<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Midbound\Http\Requests;
use Midbound\Http\Requests\Prospects\UpdateProspect;
use Midbound\Prospect;

class ProspectsController extends Controller
{
    /**
     * @param Prospect $prospect
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Prospect $prospect)
    {
        $events = $prospect->events()->latest()->get();

        return view('prospects.show', compact('prospect', 'events'));
    }

    /**
     * @param Prospect $prospect
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Prospect $prospect)
    {
        return view('prospects.edit', compact('prospect'));
    }

    /**
     * @param UpdateProspect $request
     * @param Prospect $prospect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProspect $request, Prospect $prospect)
    {
        $prospect->update($request->only('name', 'email', 'phone', 'company'));

        return redirect()->route('app.prospects.show', $prospect)->with('success', 'Prospect updated!');
    }
}
