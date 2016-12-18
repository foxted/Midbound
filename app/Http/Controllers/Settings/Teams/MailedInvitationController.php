<?php

namespace Midbound\Http\Controllers\Settings\Teams;

use Laravel\Spark\Spark;
// use Illuminate\Http\Request;
// use Laravel\Spark\Invitation;

use Midbound\Http\Requests\Settings\Teams\CreateInvitationRequest;
use Laravel\Spark\Contracts\Interactions\Settings\Teams\SendInvitation;

use Midbound\Http\Controllers\Controller as Controller;

class MailedInvitationController extends Controller
{

    /**
     * Create a new invitation.
     *
     * @param  CreateInvitationRequest  $request
     * @param  \Laravel\Spark\Team  $team
     * @return Response
     */
    public function store(CreateInvitationRequest $request, $team)
    {
        Spark::interact(SendInvitation::class, [$team, $request->email]);
    }

 
}
