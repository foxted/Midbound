@extends('spark::layouts.app')

@section('title')
	Turn prospects into leads faster with Midbound
@stop

@section('content')
<div class="home-banner">
<div class="color-overlay">
    <h1>Turn prospects into leads, faster</h1>
    <p class="lead">Midbound tells you which sales prospects matter and when to make your move.</p>
    <div class="cta">
    		<a class="btn btn-primary btn-lg">Start 60-Day Free Trial</a>
    	 <!-- <form class="form-inline" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="email" id="inputemail" class="form-control" value="" placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Get Early Access</button>
    		</form> -->
    </div>
</div>
</div>

<div class="container">
<div class="benefits">
    <div class="panel panel-benefit">
    		<div class="panel-body">
    			<div class="description">
    				<h2>See what prospects are doing <em>right now</em></h2>
    				Research shows that response rate is where the money's at. With Midbound, you'll have real-time data on who is doing what so you can act immediately.
    			</div>
    		<div class="img-preview">
    			<img class="img-responsive" src="/img/midbound-feature-real-time.jpg">
    		</div>
    		</div>
    </div>
</div>
</div>
@endsection
