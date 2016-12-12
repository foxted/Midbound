<?php

namespace Midbound\Http\Controllers\Settings\Teams;

use Laravel\Spark\Events\Teams\TeamMemberRemoved;
use Midbound\Http\Requests\Settings\Teams\RemoveTeamMemberRequest;
use Midbound\Http\Controllers\Controller as Controller;

class TeamMemberController extends Controller
{
    /**
     * Remove the given team member from the team.
     *
     * @param  RemoveTeamMemberRequest  $request
     * @param  \Laravel\Spark\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function destroy(RemoveTeamMemberRequest $request, $team, $member)
    {
        $team->users()->detach($member->id);

        event(new TeamMemberRemoved($team, $member));
    }
}
