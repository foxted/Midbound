<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Response;
use Midbound\Http\Controllers\Controller;
use Midbound\Http\Requests\Settings\Websites\CreateWebsite;
use Midbound\Http\Requests\Settings\Websites\UpdateWebsite;
use Midbound\Website;

/**
 * Class WebsitesController
 * @package Midbound\Http\Controllers\API
 */
class WebsitesController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $websites = Website::currentTeam()->latest()->get();

        return response()->json($websites);
    }

    /**
     * @param CreateWebsite $request
     * @return mixed
     */
    public function store(CreateWebsite $request)
    {
        $website = Website::create($request->only('url'));

        return response()->json($website);
    }


    /**
     * @param UpdateWebsiteUrl $request
      * @return mixed
     */
    public function update(UpdateWebsite $request, $id)
    {
        $websites = Website::currentTeam()->latest()->get();
        $website = $websites->find($id);
        $website->fill($request->only('url'))->save();
        return response()->json($website);
    }

    /**
     * @param Website $website
     * @return mixed
     */
    public function show(Website $website)
    {
        return response()->json($website);
    }

    /**
     * @param Website $website
     * @return mixed
     */
    public function destroy(Website $website)
    {
        $website->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
