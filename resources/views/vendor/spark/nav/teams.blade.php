<!-- Teams -->
<li class="dropdown-header" v-if="teams.length > 1">Switch Teams</li>

<!-- Switch Current Team -->
<li v-for="team in teams" v-if="teams.length > 1">
    <a href="/teams/@{{ team.id }}/switch">
        <span v-if="user.current_team_id == team.id">
            @{{ team.name }}
            <i class="fa fa-fw fa-btn fa-check text-success text-right"></i>
        </span>

        <span v-else>
            @{{ team.name }}
        </span>
    </a>
</li>

<li class="divider" v-if="teams.length > 1"></li>