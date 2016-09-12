@extends('layouts.guest')

@section('title')
	Turn prospects into leads faster with Midbound
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Turn prospects into leads, faster</h1>
        <p class="lead">With Midbound, you know which sales prospects matter and when to make your move.</p>
        <div class="cta">
                <a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg">Get Started for Free</a>
        </div>
    </div>
</div>

<div class="container">
<div class="benefits">
    <div class="panel panel-benefit">
    		<div class="panel-body">
    			<div class="description">
    				<h2>Engage prospects at the <em>right time</em></h2>
    				<p>Research shows that response rate is where the money's at. With Midbound, you'll have real-time data on who is doing what so you can act immediately.</p>
                    <!-- <a href="/features/real-time">Learn more</a> -->
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
                    <!-- <a href="/features/scoring">Learn more</a> -->
                </div>
            <div class="img-preview">
                <a href="/features/scoring">
                    <img class="img-responsive" src="/img/midbound-feature-scoring.jpg">
                </a>
            </div>
            </div>
    </div>
    <div class="panel panel-benefit text-center">
        <h2>The simple, nimble Prospect Engagement Platform</h2>
        <p>Try Midbound today to see how simple life can be.</p>
    <div class="cta">
            <a href="{{ route('auth.register') }}" class="btn btn-primary btn-lg">Get Started for Free</a>
    </div>
    </div>
</div>

</div>
@endsection
