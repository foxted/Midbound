<?php

namespace Midbound\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Scout\Builder;
use Midbound\Http\Requests;
use Midbound\Prospect;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $prospects = Prospect::search($request->get('q', ''))
            ->where('team.data.id', auth()->user()->currentTeam()->id);

        $prospects = $this->applyFilters($request, $prospects);

        $prospects = $prospects->get();

        return view('search.index', compact('prospects'));
    }

    /**
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    public function applyFilters(Request $request, Builder $query)
    {
        if ($request->has('assigned')) {
            $query->where('assignee.data.id', auth()->id());
        }

        if ($request->has('ignored')) {
            $query->where('is_ignored', 1);
        } else {
            $query->where('is_ignored', 0);
        }

        return $query;
    }
}
