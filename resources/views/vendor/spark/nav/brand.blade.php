 @if (Auth::check())
	<a class="navbar-brand" href="{{ route('app.activity') }}">
		<img src="/img/color-logo-inverse.png" style="height: 18px;">
	</a>
@else
	<a class="navbar-brand" href="/">
		<img src="/img/color-logo.png" style="height: 18px;">
	</a>
@endif


