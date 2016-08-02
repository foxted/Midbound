 @if (Auth::check())
	<a class="navbar-brand" href="{{ route('app.dashboard') }}">
		<span class="light-blue">MID</span>BOUND
	</a>
@else
	<a class="navbar-brand" href="/">
		<span class="light-blue">MID</span><span class="dark-blue">BOUND</span>
	</a>
@endif


