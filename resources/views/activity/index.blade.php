@extends('spark::layouts.app')

@section('content')
<activity :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2 filter-tabs">
                <div class="list-group">
                    <li class="list-header">Filters</li>
                    <li class="list-group-item">
                        <a href="#most-recent" aria-controls="most-recent" role="tab" data-toggle="tab">
                            Most Recent
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#most-engaged" aria-controls="most-engaged" role="tab" data-toggle="tab">
                            Most Engaged
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#newly-added" aria-controls="newly-added" role="tab" data-toggle="tab">
                            Newly Added
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#recently-viewed" aria-controls="recently-viewed" role="tab" data-toggle="tab">
                            Recently Viewed
                        </a>
                    </li>
                </div>
                <hr>
                <div class="list-group">
                    <li class="list-group-item">
                        <a href="#ignored" aria-controls="ignored" role="tab" data-toggle="tab">
                            Ignored
                        </a>
                    </li>
                </div>
            </div>
            <!-- If NO events have been tracked -->
            <div class="col-sm-9 col-md-10 text-center empty-message" v-if="events.length === 0">
                <h2>No activity...yet</h2>
                <p>If you <em>just</em> created your account, this is completely normal.</p>
                <p>Be sure to <a href="/settings#/websites">add the Midbound Tracker to your website</a>.</p>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10" v-if="events.length === 0">
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
            <!-- If events have been tracked -->
            <div class="col-sm-9 col-md-10" v-if="events.length > 0">
                <div class="panel panel-prospect" v-for="event in events">
                    <div class="panel-body">
                        <div class="prospect-top">
                            <div class="prospect-left">
                                <div class="prospect-header">
                                    <div class="prospect-avatar">
                                        <a :href="event.prospect.url"><img :src="event.prospect.avatar" width="40"></a>
                                    </div>
                                    <div class="prospect-info">
                                        <h4 class="name">
                                            <a :href="event.prospect.url">@{{ event.prospect.profile.names[0] || event.prospect.profile.name  }}</a>
                                        </h4>
                                        <a href="mailto:@{{ event.prospect.profile.emails[0] || event.prospect.email }}" class="email">@{{ event.prospect.profile.emails[0] || event.prospect.email }}</a>
                                    </div>
                                </div>
                            </div>
                             <div class="prospect-right">
                                <div class="engagement"><a :href="event.prospect.url"><img src="/img/engagement-graph.png" height="40"></a>
                                9
                                </div>
                            </div>
                        </div>
                        <div class="prospect-event">

                            <p class="event" v-if="event.action === 'pageview'">
                                @{{ event.actionVerb }} <a href="">@{{ event.url }}</a>
                            </p>
                            <p class="event" v-else>
                                @{{ event.actionVerb }} <a href="">@{{ event.resource }}</a>
                            </p>
                           <time class="event-date">
                                &mdash;
                                @{{ event.created_at | human }}
                            </time>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-user"></i> Assign</a>
                        <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
                        <div class="pull-right">
                        <a class="btn btn-ghost btn-sm " href="#"><i class="fa fa-ban"></i> Ignore</a>
                        </div>
                    </div>
                </div>
                <button @click="loadMore" v-if="pagination.current_page < pagination.last_page" type="button" class="btn btn-ghost btn-lg btn-block" data-loading-text="Loading...">
                    Load more
                </button>
            </div>
        </div>
    </div>
</activity>
@endsection