<!-- Left Side Of Navbar -->
<li @if(request()->is('activity*')) class="active" @endif>
    <a href="{{ route('app.activity') }}">
        Activity
    </a>
</li>
<!--- <li @if(request()->is('companies*')) class="active" @endif>
    <a href="#">
        Companies
    </a>
</li>-->