@extends('layouts.guest')

@section('title')
	Turn prospects into leads faster with Midbound
@stop

@section('content')
<div class="home-banner">
<div class="color-overlay">
    <h1>Turn prospects into leads, faster</h1>
    <p class="lead">Midbound tells you which sales prospects matter and when to make your move.</p>
    <div class="cta">
    		<a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg">Start 60-Day Free Trial</a>
    	 <!-- <form class="form-inline" method="POST" action="">
        {{--{{ csrf_field() }}--}}
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
    				<p>Research shows that response rate is where the money's at. With Midbound, you'll have real-time data on who is doing what so you can act immediately.</p>
                    <a href="/features/real-time">Learn more</a>
    			</div>
    		<div class="img-preview">
    			<a href="/features/real-time">
                    <img class="img-responsive" src="/img/midbound-feature-real-time.jpg">
                </a>
    		</div>
    		</div>
    </div>
    <div class="panel panel-benefit right">
            <div class="panel-body">
                <div class="description">
                    <h2>Focus on prospects who <em>actually matter</em></h2>
                    <p>There's only so much time in a day. With Midbound, you'll spend that time effectively by putting your energy behind the highest value prospects, at the right time. We automatically score prospects by default and you can create a custom scoring system.</p>
                    <a href="/features/scoring">Learn more</a>
                </div>
            <div class="img-preview">
                <a href="/features/scoring">
                    <img class="img-responsive" src="/img/midbound-feature-scoring.jpg">
                </a>
            </div>
            </div>
    </div>
</div>
</div>
@endsection
