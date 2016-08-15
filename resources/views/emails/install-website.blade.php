<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<h1>{{ $user->name }} needs your help!</h1>

<p>
    {{ $user->name }} just registered on <a href="{{ route('home') }}">Midbound</a> and need your help to install our tracking script on the following website:
</p>

<p><a href="{{ $website->url }}">{{ $website->url }}</a></p>

<p>Simply paste this snippet just before the closing <code>&lt;body&gt;</code> tag of your website, on every public-facing pages.</p>

<p><pre>{{ $website->snippet }}</pre></p>

<p>Cheers!</p>
<p>Team Midbound</p>