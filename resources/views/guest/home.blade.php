@extends('spark::layouts.app')

@section('content')
<div class="home-banner">
    <h1>Real-time B2B Prospecting</h1>
    <p class="lead">Midbound tells you which sales prospects matter and when to make your move.</p>
    <form class="form-inline" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="email" id="inputemail" class="form-control" value="" placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Get Early Access</button>
    </form>
    
</div>
@endsection
