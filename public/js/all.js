(function() {
    $('body').popover({
        selector: '[data-toggle="popover"]',
        trigger: 'click'
    });
    $('[data-toggle="popover"]').on('show.bs.popover', function() {
        setTimeout(() => {
            $(this).popover('hide');
        }, 2000);
    });
    $('body').on('click', function (e) {
        $('[data-toggle=popover]').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
})();
//# sourceMappingURL=all.js.map
