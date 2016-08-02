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
                                            <a :href="event.prospect.url">@{{ event.prospect.name }}</a>
                                        </h4>
                                        <a href="mailto:@{{ event.prospect.email }}" class="email">@{{ event.prospect.email }}</a>
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
                            <p class="event">
                                @{{ event.action }} <a href="">@{{ event.resource }}</a>
                            </p>
                           <time class="event-date">
                                &mdash;
                                @{{ event.created_at.date | human }}
                            </time>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-ghost btn-sm " href="#"><i class="fa fa-user"></i> Assign</a>
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