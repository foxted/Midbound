@extends('spark::layouts.app')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2 filter-tabs">
                <div class="list-group">
                    <li class="list-header">Filters</li>
                    <li class="list-group-item">
                        <a href="#all" aria-controls="most-recent" role="tab" data-toggle="tab">
                            All
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#my" aria-controls="most-engaged" role="tab" data-toggle="tab">
                            My Prospects
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

            <!-- If events have been tracked -->
                <div class="col-sm-9 col-md-10">
                <h4 class="text-inline">22 results for "lead"</h4>
                <h4 class="pull-right text-inline">Latest activity</h4>	
                        <div class="panel panel-prospect">
                            <div class="panel-body">
                                <div class="prospect-top">
                                <div class="checkbox">
	                                <input type="checkbox">
                                </div>
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
                                        <div class="text-light-gray small">2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-prospect">
                            <div class="panel-body">
                                <div class="prospect-top">
                                <div class="checkbox">
	                                <input type="checkbox">
                                </div>
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
                                        <div class="text-light-gray small">2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-prospect">
                            <div class="panel-body">
                                <div class="prospect-top">
                                <div class="checkbox">
	                                <input type="checkbox">
                                </div>
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
                                        <div class="text-light-gray small">2 days ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

     	</div>
	</div>
@stop