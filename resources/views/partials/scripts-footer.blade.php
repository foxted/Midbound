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

<!-- Enable Bootstrap tooltips -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
