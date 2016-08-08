<script>
    (function (m, i, d, w, a, y, s) {
        m['MidboundObject'] = a;
        m[a] = m[a] || function () { (m[a].q = m[a].q || []).push(arguments) };
        y = i.createElement(d), s = i.getElementsByTagName(d)[0];
        y.async = 1;
        y.src = w;
        s.parentNode.insertBefore(y, s);
    })(window, document, 'script', '{{ config('tracking.url') }}', 'mb');

    mb('create', '{{ $website->hash }}');
    mb('send', 'pageview');
</script>