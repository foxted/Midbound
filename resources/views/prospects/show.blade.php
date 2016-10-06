@extends('spark::layouts.app')

@section('content')
    <prospects-index :user="user" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel">
                        <div class="panel-body">
                            <img class="img-rounded img-responsive center-block" src="{{ $prospect->avatar }}" style="margin-bottom: 2em;">

                            @if($prospect->assignee)
                            <small><span class="text-uppercase text-muted">Assigned to</span></small>
                            <h4 class="text-capitalize" style="margin-top: 0;">
                                <strong>
                                    @if($prospect->assignee->id == auth()->id())
                                        Me
                                    @else
                                        {{ $prospect->assignee->name }}
                                    @endif
                                </strong>
                            </h4>
                            @endif

                            <small><span class="text-uppercase text-muted">Email</span></small>
                            <p class="text-lowercase">{{ $prospect->email }}</p>

                            @if($prospect->name)
                                <small><span class="text-uppercase text-muted">Name</span></small>
                                <p><strong>{{ $prospect->name }}</strong></p>
                            @endif

                            @if($prospect->phone)
                            <small><span class="text-uppercase text-muted">Phone</span></small>
                            <p>{{ $prospect->phone }}</p>
                            @endif

                            @if($prospect->company)
                            <small><span class="text-uppercase text-muted">Company</span></small>
                            <p>{{ $prospect->company }}</p>
                            @endif

                            <small><span class="text-uppercase text-muted">Campaign</span></small>
                            <p><a href="#">Best Practices Whitepaper Downloads</a></p>

                            <small><span class="text-uppercase text-muted">Score</span></small>
                            <p>4</p>

                            <small><span class="text-uppercase text-muted">Created</span></small>
                            <p>{{ $prospect->created_at->diffForHumans() }}</p>

                            <a href="{{ route('app.prospects.edit', $prospect) }}" class="btn btn-ghost btn-block">Edit prospect</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <p>
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                    {{--<div class="alert alert-warning" style="padding: 20px; margin: 0 0 20px;">--}}
                        {{--<strong>Next campaign action (4 of 7)</strong> from Best Practices Whitepaper Downloads:--}}
                        {{--<h4 class="lead">Send "<a href="#">Don't miss: B2B Marketing Webinar</a>"--}}
                            {{--<span class="text-right text-muted"><small>in 2 days</small></span>--}}
                        {{--</h4>--}}
                        {{--<a href="#" class="btn btn-default">Send Now</a>--}}
                        {{--<a href="#" class="" style="border-right: 1px solid; padding: 0 10px;">Skip</a>--}}
                        {{--<a href="#" class="" style="padding: 0 10px;">Switch Campaigns</a>--}}
                    {{--</div>--}}

                    @forelse($events as $event)
                    <div class="panel panel-prospect">
                        <div class="panel-body">
                            <div class="prospect-event">
                                @if($event->isPageview())
                                    <p class="event">
                                        {{ $event->actionVerb }} <a href="#">{{ $event->cleanUrl }}</a>
                                    </p>
                                @else
                                    <p class="event">
                                        {{ $event->actionVerb }} <strong>{{ $event->resource }}</strong>
                                    </p>
                                @endif

                               <time class="event-date">
                                   &mdash; {{ $event->created_at->diffForHumans() }}
                               </time>
                            </div>
                        </div>
                    </div>
                    @empty
                        @include('prospects.partials.no-events')
                    @endforelse
                </div>
            </div>
        </div>
    </prospects-index>
@endsection