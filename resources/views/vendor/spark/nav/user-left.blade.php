<!-- Left Side Of Navbar -->
<li @if(request()->is('prospects*')) class="active" @endif>
    <a href="{{ route('app.prospects.index') }}">
        Prospects
    </a>
</li>
<form class="navbar-form navbar-left search"> 
	<div class="form-group"> 
		<input class="form-control" placeholder="Search for anything..."> 
	</div> 
	<button type="submit" class="btn btn-lg btn-default">
		<i class="fa fa-search"></i>
	</button> 
</form>