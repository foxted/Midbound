<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Midbound')</title>

    <!-- Fonts -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')
    @include('layouts.partials-app.scripts-header')
</head>
<body @if (Auth::check()) class="with-navbar" @endif v-cloak>
    <div id="spark-app">
        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @else
            @include('spark::nav.guest')
        @endif

        <!-- Main Content -->
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

        <!-- JavaScript -->
        <script src="/js/app.js"></script>
        <script src="/js/all.js"></script>
        <script src="/js/sweetalert.min.js"></script>
        @include('layouts.partials-app.scripts-footer')
    </div>
</body>
</html>
