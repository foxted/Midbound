<p>Hi there,</p>

<p>To reset your Midbound password, click here: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a></p>

<p>If you did not request to reset your password, then disregard this email.</p>

@include('partials.email-footer')