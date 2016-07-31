@extends('spark::layouts.app')

@section('content')
<prospects-index :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <div class="list-header">FILTERS</div>
                    <a href="#" class="list-group-item">Most Engaged</a>
                    <a href="#" class="list-group-item">Fresh Prospects</a>
                    <a href="#" class="list-group-item">Recently Emailed</a>
                    <a href="#" class="list-group-item active">Assigned to Me</a>
                </div>
                 <div class="list-group">
                    <div class="list-header">SAVED SEARCHES</div>
                    <a href="#" class="list-group-item cta"><i class="fa fa-plus"></i> Add</a>
                </div>
                <hr>
                <div class="list-group">
                    <a href="#" class="list-group-item">Ignored</a>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <div class="panel panel-prospect" v-for="prospect in prospects">
                    <div class="panel-body">
                     <div class="prospect-top">
                            <div class="prospect-left">
                                <div class="prospect-header">
                                    <div class="prospect-avatar">
                                        <a :href="prospect.url"><img src="/img/avatar.png" width="40"></a>
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
                            <div class="event">
                                Visited <a href="#">/services/what-we-do</a> and <a :href="prospect.url">4 other pages</a>
                            </div> 
                           <div class="event-date">
                                &mdash;
                                 <a :href="prospect.url"> @{{ prospect.latest_activity.date | human }} </a> 
                            </div>   
                        </div>  
                    </div>
                    <div class="panel-footer">
                        <div class="dropdown">
                            <a class="btn btn-ghost btn-sm" href="#" dropdown-toggle" type="button" id="assignMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Assign</a>
                                 <ul class="dropdown-menu" aria-labelledby="assignMenu">
                                    <li><a href="#">Valentin (you)</a></li>
                                    <li><a href="#">James</a></li>
                                    <li><a href="#">Chris</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="disabled"><a href="#">Unassign</a></li>
                                </ul>
                        </div>
                        <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-ghost btn-sm" href="#"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
                        <div class="pull-right">
                        <a class="btn btn-ghost btn-sm " href="#"><i class="fa fa-ban"></i> Ignore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</prospects-index>
@endsection