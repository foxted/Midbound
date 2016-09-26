<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<h2>{{ $user->name }} has requested your help!</h2>

<p>
    {{ $user->name }} just registered on <a href="{{ route('home') }}">Midbound</a> and need your help to install the Midbound Tracker on the following website:
</p>

<p><a href="{{ $website->url }}">{{ $website->url }}</a></p>

<p>Simply paste this snippet just before the closing <code>&lt;body&gt;</code> tag of your website, on all public-facing pages.</p>

<p><pre>{{ $website->snippet }}</pre></p>

<p>Thank you for your help!</p>
<p>- The Midbound Team</p>

<p><strong>P.S. </strong>If you have any questions, please reach us at developers@midbound.com.</p>