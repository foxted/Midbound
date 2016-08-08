<!-- Left Side Of Navbar -->
<li @if(request()->is('activity*')) class="active" @endif>
    <a href="{{ route('app.activity') }}">
        Activity
    </a>
</li>
<form class="navbar-form navbar-left search"> 
	<div class="form-group"> 
		<input class="form-control" placeholder="Search for anything..." value="Lead"> 
	</div> 
	<!-- Default Search Panel -->
       {{--<div class="panel search">--}}
          {{--<div class="panel-body">--}}
            {{--<div class="search-results">--}}
            {{--<h3>Prospects</h3>--}}
                {{--<ul>--}}
                  {{--<li><a href="#">John Prospo<strong>lead</strong></a></li>--}}
                  {{--<li><a href="#">Bob <strong>Lead</strong>sworth</a></li>--}}
                {{--</ul>--}}
              {{--<h3>Companies</h3>--}}
              {{--<ul>--}}
                {{--<li><a href="#"><strong>Lead</strong>corp</a></li>--}}
                {{--<li><a href="#">Pro<strong>lead</strong>sper Inc</a></li>--}}
              {{--</ul>--}}
          {{--</div>--}}
          {{--</div>--}}
          {{--<div class="panel-footer">--}}
            {{--<a class="btn btn-ghost" href="#">Advanced Search</a>--}}
          {{--</div>--}}
       {{--</div>--}}
    <!-- Advanced Search Panel -->
       {{--<div class="panel search" style="margin-left: 430px;">--}}
          {{--<div class="panel-body">--}}
            {{--<div class="advanced-search"> --}}
             {{--<div class="list-group">--}}
                    {{--<div class="list-header">Type</div>--}}
                    {{--<a href="#" class="list-group-item active">Prospects</a>--}}
                    {{--<a href="#" class="list-group-item disabled">Companies</a>--}}
                    {{--<a href="#" class="list-group-item disabled">Campaigns</a>--}}
                    {{--<a href="#" class="list-group-item disabled">Tasks</a>--}}
              {{--</div>--}}
              {{--<div class="list-group">--}}
                    {{--<div class="list-header">Assigned To</div>--}}
                    {{--<a href="#" class="list-group-item active">Me</a>--}}
                    {{--<a href="#" class="list-group-item">Others</a>--}}
                    {{--<a href="#" class="list-group-item">Not assigned</a>--}}
                    {{--<a href="#" class="list-group-item">Any</a>--}}
                {{--</div>--}}
                {{--<div class="list-group">--}}
                    {{--<div class="list-header">Score</div>--}}
                    {{--<a href="#" class="list-group-item">Low</a>--}}
                    {{--<a href="#" class="list-group-item">Medium</a>--}}
                    {{--<a href="#" class="list-group-item active">High</a>--}}
                    {{--<a href="#" class="list-group-item">Any</a>--}}
                {{--</div> --}}
                {{--</div>--}}
          {{--</div>--}}
          {{--<div class="panel-footer">--}}
            {{--<a class="btn btn-primary">Search</a>--}}
            {{--<a class="btn btn-ghost">Save this search</a>--}}
            {{--<a class="btn btn-ghost pull-right">Cancel</a>--}}
          {{--</div>--}}
       {{--</div>--}}
</form>


