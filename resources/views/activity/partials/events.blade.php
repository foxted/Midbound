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
                            <a href="prospect.url" :title="prospect.name"><img :src="prospect.avatar" width="40"></a>
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
            <div class="btn-group" v-if="team && team.users">
                <button v-if="prospect.assignee" type="button" class="btn btn-ghost btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img :src="prospect.assignee.photo_url" width="20" :alt="prospect.assignee.name" class="pull-left img-responsive">&nbsp;
                    @{{ prospect.assignee.name }}
                    <span class="caret"></span>
                </button>
                <button v-else type="button" class="btn btn-ghost btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> Assign to <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li v-for="user in team.users">
                        <a href="#" @click.prevent="assign(prospect, user)">
                            <img :src="user.photo_url" width="25" :alt="user.name" class="pull-left img-responsive">&nbsp;
                            @{{ user.name }}
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" @click.prevent="unassign(prospect)">
                            Un-assign
                        </a>
                    </li>
                </ul>
            </div>
            {{--<a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-envelope"></i> Email</a>--}}
            <a class="btn btn-ghost btn-sm" href="@{{ prospect.linkedin }}">
                <i class="fa fa-linkedin-square"></i> LinkedIn
            </a>
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