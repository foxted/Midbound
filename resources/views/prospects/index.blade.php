@extends('spark::layouts.app')

@section('content')
<prospects-index :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <div class="list-header">FILTER PROSPECTS</div>
                    <a href="#" class="list-group-item">Fresh</a>
                    <a href="#" class="list-group-item">Most Engaged</a>
                    <a href="#" class="list-group-item">Recently Emailed</a>
                    <a href="#" class="list-group-item active">All</a>
                </div>
                 <div class="list-group">
                    <div class="list-header">SAVED SEARCHES</div>
                    <a href="#" class="list-group-item cta"><i class="fa fa-plus"></i> Add</a>
                </div>
                <hr>
                <div class="list-group">
                    <a href="#" class="list-group-item">Ignored</a>
                </div>
                <div class="alert alert-warning alert-dismissible undo-message" role="alert" style="display:none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  You ignored <strong>Prospect Name</strong>.
                  <a href="#">Undo</a>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <div class="panel panel-prospect" v-for="prospect in prospects" id="prospect-@{{prospect.id}}">
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
                                        <a class="email" data-toggle="modal" data-target="#emailModal">@{{ prospect.email }}</a>
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
                                Visited <a href="#">/services/what-we-do</a> and <a href="#" onclick="showMoreEvents(@{{prospect.id}});">4 other pages</a>
                             <ul class="more-events" id="moreEvents-@{{prospect.id}}" style="display:none;">
                                <li>Visited <a href="#">/case-studies/dmv</a> <span class="event-date">  @{{ prospect.latest_activity.date | human }} </span>
                                </li>
                                <li>Visited <a href="#">/resources/whitepaper</a> <span class="event-date">  @{{ prospect.latest_activity.date | human }} </span>
                                </li>
                                <li>Visited <a href="#">/blog/how-to-find-your-value-prop</a> <span class="event-date">  @{{ prospect.latest_activity.date | human }} </span>
                                </li>
                              </ul>
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
                        <a class="btn btn-ghost btn-sm " href="#" onclick="ignoreProspect(@{{prospect.id}});"><i class="fa fa-ban"></i> Ignore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</prospects-index>

<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- For demo purposes only (to show additional events) -->
<script>
    function showMoreEvents(prospect) {
        var moreEvents = document.getElementById("moreEvents-" + prospect);
        if (moreEvents.style.display === "none") {
            moreEvents.style.display = "block";
        }
        else {
            moreEvents.style.display = "none"
        }
    }
    function ignoreProspect(prospect) {
        var prospectPanel = document.getElementById("prospect-" + prospect);
        var undoMessage = document.getElementsByClassName("undo-message")[0];
        prospectPanel.style.display = "none";
        undoMessage.style.display = "block";
    }
</script>
@endsection