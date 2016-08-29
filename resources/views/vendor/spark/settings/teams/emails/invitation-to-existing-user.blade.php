<p>Hi there,</p>

<p>{{ $invitation->team->owner->name }} has invited you to join their team on Midbound!</p>

<p>Since you already have a Midbound account, you may accept the invitation from your
account settings screen.</p>

<p>Login and Accept: <a href="{{ url('/') }}">{{ url('/') }}</a></p>

@include('partials.email-footer')
