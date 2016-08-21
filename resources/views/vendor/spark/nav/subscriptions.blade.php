@if (Auth::user()->onTrial())
    <!-- Trial Reminder -->
    <li class="dropdown-header">Trial</li>

    <li>
        <a href="/settings#/subscription">
            <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscribe
        </a>
    </li>

    <li class="divider"></li>
@endif

<li class="dropdown-header">{{Auth::user()->currentTeam()->name}}</li>
    <li>
        <a href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/membership">
            <i class="fa fa-fw fa-btn fa-users"></i>3 Members
        </a>
    </li>
    <li>
        <a href="/settings/teams/{{ Auth::user()->currentTeam()->id }}">
            <i class="fa fa-fw fa-btn fa-cog"></i>Settings
        </a>
    </li>
    @if (Spark::usesTeams() && Auth::user()->currentTeamOnTrial())
    <!-- Team Trial Reminder -->
    <li>
        <small><span class="text-danger">Free Trial ends September 19th</span></small>
    </li>
    <a class="btn btn-primary" href="/settings/teams/{{ Auth::user()->currentTeam()->id }}#/subscription">Upgrade</a>
    
    @endif

    <li class="divider"></li>

