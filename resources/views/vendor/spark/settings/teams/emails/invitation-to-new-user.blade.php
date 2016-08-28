Hi there,

<p>{{ $invitation->team->owner->name }} has invited you to join their team on Midbound!</p>

<p>Click here to accept their invitation: <a href="{{ url('register?invitation='.$invitation->token) }}">{{ url('register?invitation='.$invitation->token) }}</a></p>

@include('partials.email-footer')
