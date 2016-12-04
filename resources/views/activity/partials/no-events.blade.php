<div class="col-sm-9 col-md-10" v-else>
    @if(Request::is('activity/ignored'))
        <div class="text-center empty-message">
            <h2>No prospects ignored... yet.</h2>
            <p>
                Go on the <a href="{{ route('app.activity') }}">activity</a> page and click
                <span class="btn btn-ghost"><i class="fa fa-ban"></i>&nbsp;Ignore</span> to stop following prospects!</p>
        </div>
    @elseif(Request::is('activity/prospects'))
        <div class="text-center empty-message">
            <h2>No prospects assigned to you... yet.</h2>
            <p>Go on the <a href="{{ route('app.activity') }}">activity</a> page and assign prospect to yourself!</p>
        </div>
    @else
        <div class="text-center empty-message">
            <h2>No prospects... yet.</h2>
            <p>If you <em>just</em> created your account, this is completely normal.</p>
            <p>Be sure to <a href="/settings/teams/{{ auth()->user()->currentTeam()->id }}#/websites">add the Midbound Tracker to your website</a>.</p>
        </div>
    @endif
    <div class="panel panel-prospect">
            <div class="panel-overlay"></div>
            <div class="panel-body">
                <div class="prospect-top">
                    <div class="prospect-left">
                        <div class="prospect-header">
                            <div class="prospect-avatar">
                                <a><img src="/img/kip.jpg" width="40"></a>
                            </div>
                            <div class="prospect-info">
                                <h4 class="name">
                                    <a>Kip Dynamite</a>
                                </h4>
                                <a class="email">kip@kipitserious.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="prospect-right">
                        <div class="engagement"><a><img src="/img/engagement-graph.png" height="40"></a>
                            4
                        </div>
                    </div>
                </div>
                <div class="prospect-event">

                    <p class="event">
                        Visited <a>/services/</a> and <a>6 other pages</a>
                    </p>
                    <time class="event-date">
                        &mdash;
                        3 minutes ago
                    </time>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-ghost btn-sm"><i class="fa fa-user"></i> Assign</a>
                <a class="btn btn-ghost btn-sm"><i class="fa fa-envelope"></i> Email</a>
                <a class="btn btn-ghost btn-sm"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
                <div class="pull-right">
                    <a class="btn btn-ghost btn-sm"><i class="fa fa-ban"></i> Ignore</a>
                </div>
            </div>
    </div>
    <div class="panel panel-prospect">
        <div class="panel-body">
            <div class="prospect-top">
                <div class="prospect-left">
                    <div class="prospect-header">
                        <div class="prospect-avatar">
                            <a><img src="/img/ray.jpg" width="40"></a>
                        </div>
                        <div class="prospect-info">
                            <h4 class="name">
                                <a>Raymond Gilette</a>
                            </h4>
                            <a class="email">raymond.q.gillette@figgis.agency</a>
                        </div>
                    </div>
                </div>
                <div class="prospect-right">
                    <div class="engagement"><a><img src="/img/engagement-graph.png" height="40"></a>
                        9
                    </div>
                </div>
            </div>
            <div class="prospect-event">
                <p class="event">
                    Downloaded <a>10 New Ways to Train Smarter</a> and visited <a>2  pages</a>
                </p>
                <time class="event-date">
                    &mdash;
                    24 minutes ago
                </time>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-ghost btn-sm"><i class="fa fa-user"></i> Assign</a>
            <a class="btn btn-ghost btn-sm"><i class="fa fa-envelope"></i> Email</a>
            <a class="btn btn-ghost btn-sm"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
            <div class="pull-right">
                <a class="btn btn-ghost btn-sm"><i class="fa fa-ban"></i> Ignore</a>
            </div>
        </div>
    </div>
    <div class="panel panel-prospect">
        <div class="panel-body">
            <div class="prospect-top">
                <div class="prospect-left">
                    <div class="prospect-header">
                        <div class="prospect-avatar">
                            <a><img src="/img/pam.jpg" width="40"></a>
                        </div>
                        <div class="prospect-info">
                            <h4 class="name">
                                <a>Pam Beesly</a>
                            </h4>
                            <a class="email">pamela.beesly@dundermifflin.com</a>
                        </div>
                    </div>
                </div>
                <div class="prospect-right">
                    <div class="engagement"><a><img src="/img/engagement-graph.png" height="40"></a>
                        7
                    </div>
                </div>
            </div>
            <div class="prospect-event">
                <p class="event">
                    Subscribed to <a>Blog</a> and visited <a>6  pages</a>
                </p>
                <time class="event-date">
                    &mdash;
                    1 hour ago
                </time>
            </div>
        </div>
        <div class="panel-footer">
            <a class="btn btn-ghost btn-sm"><i class="fa fa-user"></i> Assign</a>
            <a class="btn btn-ghost btn-sm"><i class="fa fa-envelope"></i> Email</a>
            <a class="btn btn-ghost btn-sm"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
            <div class="pull-right">
                <a class="btn btn-ghost btn-sm"><i class="fa fa-ban"></i> Ignore</a>
            </div>
        </div>
    </div>
</div>