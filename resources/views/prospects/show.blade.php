@extends('spark::layouts.app')

@section('content')
    <prospects-index :user="user" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel">
                        <div class="panel-body">
                            <img class="img-rounded img-responsive center-block" src="{{ $prospect->avatar }}" style="margin-bottom: 2em;">
                            <small><span class="text-uppercase text-muted">Name</span></small>
                            <h4 class="text-capitalize" style="margin-top: 0;"><strong>{{ $prospect->name }}</strong></h4>

                            <small><span class="text-uppercase text-muted">Email</span></small>
                            <p class="text-lowercase"><a href="#">{{ $prospect->email }}</a></p>

                            <small><span class="text-uppercase text-muted">Phone</span></small>
                            <p><a href="#">{{ $prospect->phone or 'N/A'}}</a></p>

                            <small><span class="text-uppercase text-muted">Company</span></small>
                            <p><a href="/midbound-frontend/company-detail.php?id=97">Vulputate Risus A PC</a></p>

                            <small><span class="text-uppercase text-muted">Campaign</span></small>
                            <p><a href="#">Best Practices Whitepaper Downloads</a></p>

                            <small><span class="text-uppercase text-muted">Score</span></small>
                            <p>4</p>

                            <small><span class="text-uppercase text-muted">Created</span></small>
                            <p>{{ $prospect->created_at->format(config('app.date_format')) }}</p>

                            <a href="#" class="btn btn-default">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    {{--<div class="alert alert-warning" style="padding: 20px; margin: 0 0 20px;">--}}
                        {{--<strong>Next campaign action (4 of 7)</strong> from Best Practices Whitepaper Downloads:--}}
                        {{--<h4 class="lead">Send "<a href="#">Don't miss: B2B Marketing Webinar</a>"--}}
                            {{--<span class="text-right text-muted"><small>in 2 days</small></span>--}}
                        {{--</h4>--}}
                        {{--<a href="#" class="btn btn-default">Send Now</a>--}}
                        {{--<a href="#" class="" style="border-right: 1px solid; padding: 0 10px;">Skip</a>--}}
                        {{--<a href="#" class="" style="padding: 0 10px;">Switch Campaigns</a>--}}
                    {{--</div>--}}

                    @foreach($events as $event)
                    <div class="panel panel-prospect">
                        <div class="panel-body">
                            <div class="prospect-event">
                                <p class="event">
                                    {{ $event->action }} <a href="#">{{ $event->resource }}</a>
                                </p>
                               <time class="event-date">
                                    &mdash;
                                      {{ $event->created_at->format(config('app.date_format')) }}
                                </time>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </prospects-index>
@endsection