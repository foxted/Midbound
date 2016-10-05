@extends('spark::layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <div class="list-group">
                    <li class="list-header">Filters</li>
                    <li class="list-group-item @if(!Request::has('assigned') && !Request::has('ignored')) active @endif">
                        <a href="{{ route('app.search', ['q' => Request::get('q')]) }}" aria-controls="all">
                            All
                        </a>
                    </li>
                    <li class="list-group-item @if(Request::get('assigned')) active @endif">
                        <a href="{{ route('app.search', ['q' => Request::get('q'), 'assigned' => true]) }}" aria-controls="assigned">
                            My Prospects
                        </a>
                    </li>
                </div>
                <hr>
                <div class="list-group">
                    <li class="list-group-item @if(Request::get('ignored')) active @endif">
                        <a href="{{ route('app.search', ['q' => Request::get('q'), 'ignored' => true]) }}" aria-controls="ignored">
                            Ignored
                        </a>
                    </li>
                </div>
            </div>

            <!-- If events have been tracked -->
            <div class="col-sm-9 col-md-10">
                <h4 class="text-inline">{{ $prospects->count() }} results for "{{ Request::get('q') }}"</h4>
                @foreach($prospects as $prospect)
                    <div class="panel panel-prospect">
                        <div class="panel-body">
                            <div class="prospect-top">
                                {{--<div class="checkbox">--}}
                                    {{--<input type="checkbox">--}}
                                {{--</div>--}}
                                <div class="prospect-left">
                                    <div class="prospect-header">
                                        <div class="prospect-avatar">
                                            <a><img src="{{ $prospect->avatar }}" width="40"></a>
                                        </div>
                                        <div class="prospect-info">
                                            <h4 class="name">
                                                <a>{{ $prospect->name }}</a>
                                            </h4>
                                            <a class="email">{{ $prospect->email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="prospect-right">
                                    <div class="text-light-gray small">
                                        {{ $prospect->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
     	</div>
	</div>
@stop