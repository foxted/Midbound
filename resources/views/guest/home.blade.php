@extends('layouts.guest')

@section('title')
    Connect with the right prospects, at the right time
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Connect with the right prospects, at the right time</h1>
            <p class="lead">
                Midbound tells you when prospects are interested and
                makes it easy to connect with them just in time, with the right message.
            </p>
            <newsletter inline-template>
                @include('guest.partials.newsletter')
            </newsletter>
        </div>
    </div>

    <div class="container">
        <div class="benefits">
            <div class="panel panel-benefit">
                <div class="panel-body">
                    <div class="description">
                        <h2>Engage prospects at the <em>right time</em></h2>
                        <p>Research shows that response rate is where the money's at. With Midbound, you'll have
                            real-time data on who is doing what so you can act immediately.</p>
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
                        <p>There's only so much time in a day. With Midbound, you'll spend that time effectively by
                            putting your energy behind the highest value prospects, at the right time. We automatically
                            score prospects by default and you can create a custom scoring system.</p>
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
                <h2>The simple, nimble Prospect Connection Platform</h2>
                <p>Request access to the Midbound beta to see how simple life can be.</p>
                <div class="row">
                    <newsletter inline-template>
                        @include('guest.partials.newsletter')
                    </newsletter>
                </div>
            </div>
        </div>
    </div>
@endsection
