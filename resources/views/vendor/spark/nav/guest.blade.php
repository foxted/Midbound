<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Branding Image -->
            <a class="navbar-brand" href="/">
                <img src="/img/color-logo.png" style="height: 18px;">
            </a>
        </div>

        @if(auth()->guest())
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    {{--<li><a href="/plans">Plans &amp; Pricing</a></li>--}}
                    <li><a href="/login" class="navbar-link">Log In</a></li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    {{--<li><a href="/register" class="btn btn-primary">60-Day Free Trial</a></li>--}}
                    <li><a href="/dashboard" class="navbar-link">Go to dashboard</a></li>
                </ul>
            </div>
        @endif
    </div>
</nav>
