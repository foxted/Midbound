<li class="dropdown">
    <!-- User Photo / Name -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <!-- <img :src="user.photo_url" class="spark-nav-profile-photo m-r-xs"> -->
        {{Auth::user()->name}}
        <span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <!-- Impersonation -->
        @if (session('spark:impersonator'))
            <li class="dropdown-header">Impersonation</li>

            <!-- Stop Impersonating -->
            <li>
                <a href="/spark/kiosk/users/stop-impersonating">
                    <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                </a>
            </li>


        @endif

    <!-- Developer -->
        @if (Spark::developer(Auth::user()->email))
            @include('spark::nav.developer')
        @endif

    <!-- Subscription Reminders -->
        @include('spark::nav.subscriptions')



        @if (Spark::usesTeams())
        <!-- Team Settings -->
            @include('spark::nav.teams')
        @endif

        <li class="divider"></li>

        <!-- Settings -->
        <!-- <li class="dropdown-header">Me</li> -->

        <!-- Your Settings -->
        <li>
            <a href="/settings">
                <i class="fa fa-fw fa-btn fa-cog"></i>Settings
            </a>
        </li>

        <!-- Support -->
        <!-- <li class="dropdown-header">Support</li> -->

        <li>
            <a @click.prevent="showSupportForm" style="cursor: pointer;">
                <i class="fa fa-fw fa-btn fa-paper-plane"></i>Support
            </a>
        </li>

        <li class="divider"></li>

        <!-- Logout -->
        <li>
            <a href="/logout">
                <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
            </a>
        </li>
    </ul>
</li>