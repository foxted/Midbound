@extends('spark::layouts.app')

@section('title')
	Turn Prospects into Leads Faster with Midbound
@stop

@section('content')
<div class="home-banner">
<div class="color-overlay">
    <h1>Turn prospects into leads, faster</h1>
    <p class="lead">Midbound tells you which sales prospects matter <br>and when to make your move.</p>
    <form class="form-inline" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="email" id="inputemail" class="form-control" value="" placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Get Early Access</button>
    </form>
</div>
</div>
@endsection
