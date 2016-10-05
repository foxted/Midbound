<li class="dropdown @if(request()->is('settings*')) active @endif">
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

    <!-- Your Settings -->
        <!-- <li class="dropdown-header">Me</li> -->
        <li>
            <a href="/settings#/profile">
                <i class="fa fa-fw fa-btn fa-user"></i>My Account
            </a>
        </li>
        <!-- <li>
            <a href="/settings#/teams">
                <i class="fa fa-fw fa-btn fa-user"></i>Organizations
            </a>
        </li> -->
        <li class="divider"></li>
    <!-- Subscription Reminders -->
        @include('spark::nav.subscriptions')



        @if (Spark::usesTeams() && auth()->user()->teams)
            <!-- Team Settings -->
            @include('spark::nav.teams')
        @endif

        <!-- Support -->
        <!-- <li class="dropdown-header">Support</li> -->

        <li>
            <a @click.prevent="showSupportForm" style="cursor: pointer;">
                <i class="fa fa-fw fa-btn fa-question-circle"></i>Get Support
            </a>
        </li>

        

        <!-- Logout -->
        <li>
            <a href="/logout">
                <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
            </a>
        </li>
    </ul>
</li>