<!-- Left Side Of Navbar -->
<li @if(request()->is('prospects*')) class="active" @endif>
    <a href="{{ route('app.prospects.index') }}">
        Prospects
    </a>
</li>
<!--- <li @if(request()->is('companies*')) class="active" @endif>
    <a href="#">
        Companies
    </a>
</li>-->