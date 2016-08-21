<!-- Teams -->
<li v-if="teams.length > 1" class="dropdown-header">Switch Teams</li>

<!-- Switch Current Team -->
<li v-if="teams.length > 1" v-for="team in teams">
    <a href="/teams/@{{ team.id }}/switch">
        <span v-if="user.current_team_id == team.id">
            <i class="fa fa-fw fa-btn fa-check text-success"></i>@{{ team.name }}
        </span>

        <span v-else>
            <img :src="team.photo_url" class="spark-team-photo-xs"><i class="fa fa-btn"></i>@{{ team.name }}
        </span>
    </a>
</li>

<li v-if="teams.length > 1" class="divider"></li>