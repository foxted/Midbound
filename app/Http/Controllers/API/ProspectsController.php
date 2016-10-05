<?php

namespace Midbound\Http\Controllers\API;

use Illuminate\Http\Request;
use Midbound\Http\Controllers\Controller;
use Midbound\Prospect;
use Midbound\User;

/**
 * Class ProspectsController
 * @package Midbound\Http\Controllers\API
 */
class ProspectsController extends Controller
{
    /**
     * @param Request $request
     * @param Prospect $prospect
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Prospect $prospect)
    {
        if($request->has('is_ignored')) {
            $prospect->update($request->only('is_ignored'));
        }

        if($request->has('assignee_id')) {
            $user = User::find($request->get('assignee_id'));
            $prospect->assignee()->associate($user);
            $prospect->save();
        }

        return response($prospect->toArray());
    }
}
