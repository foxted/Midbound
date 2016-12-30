<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<p>Hi there,</p>

<p>
    Thanks for joining <a href="{{ route('home') }}">Midbound</a>, the simple, nimble Prospect Engagement Platform.
</p>
<p>
    You're now part of a growing number of sales teams that want to get more done with less and escape sluggish
    enterprise sales tools, if only for a while. Welcome to the simple life!
</p>
<p>
    Don't forget to confirm your email address by visiting:
    <a href="{{ route('auth.validate', encrypt($user->email)) }}">
        {{ route('auth.validate', encrypt($user->email)) }}
    </a>
</p>
<p>
    We may periodically inform you of anything exciting that happens on our end, as we continue to build new features.
    We promise to keep those emails few and far between.
</p>

@include('partials.email-footer')