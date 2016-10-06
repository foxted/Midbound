<li class="dropdown-header">{{Auth::user()->currentTeam()->name}}</li>
<li>
    <a href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/membership">
        <i class="fa fa-fw fa-btn fa-users"></i>{{ count(Auth::user()->currentTeam()->users) }} {{ str_plural('Member',count(Auth::user()->currentTeam()->users)) }}
    </a>
</li>
<li>
    <a href="/settings/teams/{{ Auth::user()->currentTeam()->id }}">
        <i class="fa fa-fw fa-btn fa-cog"></i>Settings
    </a>
</li>
<!-- Team Trial Reminder -->
@if (Spark::usesTeams() && Auth::user()->ownsTeam(Auth::user()->currentTeam()))
    @if(Auth::user()->currentTeamOnTrial())
    <li>
        <small class="text-danger">
            Free trial ends <strong>{{ Auth::user()->currentTeam()->trialEndDateInDaysFormatted }}</strong>
        </small>
        <a class="dropdown-btn" href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/subscription">
            <button class="btn btn-block btn-primary">
                Upgrade
            </button>
        </a>
    </li>
    @elseif(Auth::user()->currentTeam()->subscribed())
        @if(Auth::user()->currentTeam()->subscription() && Auth::user()->currentTeam()->subscription()->onGracePeriod())
            <li>
                <small class="text-muted">
                    Grace period ends <strong>{{ Auth::user()->currentTeam()->gracePeriodEndDateInDaysFormatted }}</strong>
                </small>
            </li>
        @else
            <li>
                <small class="text-muted">
                    Currently on Midbound {{ Auth::user()->currentTeam()->sparkPlan()->name }} Plan
                </small>
            </li>
        @endif
    @else
    <li>
        <small class="text-muted">
            Currently on Midbound Free Plan
        </small>
        <a class="dropdown-btn" href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/subscription">
            <button class="btn btn-block btn-primary">
                Upgrade
            </button>
        </a>
    </li>
    @endif
@endif
<li class="divider"></li>

