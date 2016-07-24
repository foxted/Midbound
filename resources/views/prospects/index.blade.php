@extends('spark::layouts.app')

@section('content')
<prospects-index :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <li class="list-header">Saved Searches</li>
                    <li class="list-group-item">
                        <a href="#">Most Recent</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#">Most Engaged</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Newly Added</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Recently Viewed</a>
                    </li>
                    <li class="list-group-item cta">
                        <a href="#">
                            <span><i class="fa fa-plus"></i> Add</span>
                        </a>
                    </li>
                </div>
                 <ul class="list-group">
                    <li class="list-header">Another Section</li>
                    <li class="list-group-item">
                        <a href="#">Most Recent</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Most Engaged</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">Newly Added</a>
                    </li>
                    <li class="list-group-item cta">
                        <a href="#">
                            <span><i class="fa fa-plus"></i> Add</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="list-group">
                    <li class="list-group-item"><a href="#">Ignored</a></li>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <div class="panel panel-prospect" v-for="prospect in prospects">
                    <div class="panel-body">
                     <div class="prospect-top">
                            <div class="prospect-left">
                                <div class="prospect-header">
                                    <div class="prospect-avatar">
                                        <a :href="prospect.url"><img src="http://loremflickr.com/64/64/business+photo" width="40"></a>
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
                        <a class="btn btn-ghost btn-sm " href="#"><i class="fa fa-user"></i> Assign</a>
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