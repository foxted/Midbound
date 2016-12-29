<script>
    (function (h, i, q, u, o, t, a) {
        h['Midbound'] = o;
        h[o] = h[o] || function () {
                (h[o].q = h[o].q || []).push(arguments)
            }, h[o].l = 1 * new Date();
        t = i.createElement(q), a = i.getElementsByTagName(q)[0];
        t.async = 1;
        t.src = u;
        a.parentNode.insertBefore(t, a);
    })(window, document, 'script', '{{ config('tracking.url') }}', 'mb');

    mb('create', '{{ $website->hash }}');
    mb('send', 'pageview');
</script>