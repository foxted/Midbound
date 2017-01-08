@if(Auth::check())
    <div class="container">
        @if(Auth::user()->isNotConfirmed())
        <div class="alert alert-warning">
            <p><strong>Confirm your email address</strong></p>
            <p>Don't forget to confirm your email address by clicking the link sent in your welcome email.</p>
        </div>
        @endif
    </div>
@endif