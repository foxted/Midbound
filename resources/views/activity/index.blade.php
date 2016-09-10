@extends('spark::layouts.app')

@section('content')
<activity :user="user" filter="{{ $filter }}" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <li class="list-header">Filters</li>
                    <li class="list-group-item" :class="{'active': !filter}">
                        <a href="/activity" aria-controls="most-recent">
                            All
                        </a>
                    </li>
                    <li class="list-group-item" :class="{'active': filter == 'prospects'}">
                        <a href="/activity/prospects" aria-controls="most-engaged">
                            My Prospects
                        </a>
                    </li>
                </div>
                <hr>
                <div class="list-group">
                    <li class="list-group-item" :class="{'active': filter == 'ignored'}">
                        <a href="/activity/ignored" aria-controls="ignored">
                            Ignored
                        </a>
                    </li>
                </div>
            </div>
            <div v-if="!loading">
                <!-- If events have been tracked -->
                <div class="col-sm-9 col-md-10" v-if="prospects && prospects.length">
                    {{--<div class="container">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">--}}
                                {{--<nav class="navbar navbar-default bulk-actions">--}}
                                    {{--<ul class="nav navbar-nav">--}}
                                        {{--<li><h4 class="navbar-text">2 selected</h4></li>--}}
                                        {{--<li><button class="btn btn-default navbar-btn">Ignore</button></li>--}}
                                    {{--</ul>--}}
                                {{--</nav>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="panel panel-prospect" v-for="prospect in prospects">
                        <div class="panel-body">
                            <div class="prospect-top">
                                <div class="prospect-left">
                                    <div class="prospect-header">
                                        <div class="prospect-avatar">
                                            <a :href="prospect.url"><img :src="prospect.avatar" width="40"></a>
                                        </div>
                                        <div class="prospect-info">
                                            <h4 class="name">
                                                <a :href="prospect.url">@{{ prospect.name }}</a>
                                            </h4>
                                            <a href="mailto:@{{ prospect.email }}" class="email">@{{ prospect.email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prospect-right">
                                    <div class="engagement"><a :href="prospect.url"><img src="/img/engagement-graph.png" height="40"></a>
                                        9
                                    </div>
                                </div>
                            </div>
                            <div class="prospect-event">
                                <p class="event" v-if="prospect.latest_event.action === 'pageview'">
                                    @{{ prospect.latest_event.actionVerb }} <a href="">@{{ prospect.latest_event.url }}</a>
                                </p>
                                <p class="event" v-else>
                                    @{{ prospect.latest_event.actionVerb }} <a href="">@{{ prospect.latest_event.resource }}</a>
                                </p>
                                <time class="event-date">
                                    &mdash;
                                    @{{ prospect.latest_event.created_at | human }}
                                </time>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-user"></i> Assign</a>
                            <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
                            <div class="pull-right">
                                <button class="btn btn-ghost btn-sm" @click="track(prospect)" v-if="prospect.is_ignored">
                                    <i class="fa fa-unban"></i> Track again
                                </button>
                                <button class="btn btn-ghost btn-sm" @click="ignore(prospect)" v-else>
                                    <i class="fa fa-ban"></i> Ignore
                                </button>
                            </div>
                        </div>
                    </div>
                    <button @click="loadMore" v-if="pagination.current_page < pagination.last_page" type="button" class="btn btn-ghost btn-lg btn-block" data-loading-text="Loading...">
                    Load more
                    </button>
                </div>
                <!-- If NO events have been tracked -->
                <div class="col-sm-9 col-md-10" v-else>
                    <div class="col-sm-9 col-md-10 text-center empty-message">
                        <h2>No activity...yet</h2>
                        <p>If you <em>just</em> created your account, this is completely normal.</p>
                        <p>Be sure to <a href="/settings#/websites">add the Midbound Tracker to your website</a>.</p>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-md-10">
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
                </div>
            </div>
            <div class="text-center text-muted" v-else>
                <i class="fa fa-pulse fa-spinner fa-3x"></i>
            </div>
        </div>
    </div>
</activity>
@endsection