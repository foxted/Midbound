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
@include('partials.scripts-header')
<!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>
<div id="spark-app" v-cloak>
    <!-- Navigation -->
    @include('spark::nav.guest')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    @include('guest.footer')

    <!-- Application Level Modals -->
    @if (Auth::check())
        @include('spark::modals.notifications')
        @include('spark::modals.support')
        @include('spark::modals.session-expired')
    @endif

    <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    @include('partials.scripts-footer')
<!-- Midbound script -->
    <script>
        (function (m, i, d, w, a, y, s) {
            m['MidboundObject'] = a;
            m[a] = m[a] || function () { (m[a].q = m[a].q || []).push(arguments) };
            y = i.createElement(d), s = i.getElementsByTagName(d)[0];
            y.async = 1;
            y.src = w;
            s.parentNode.insertBefore(y, s);
        })(window, document, 'script', 'https://cdn.midbound.com/midbound.js', 'mb');

        mb('create', 'MB-576WQ6BX-7');
        mb('send', 'pageview');
    </script>
</div>
</body>
</html>
