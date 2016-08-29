import './filters';

require('spark-bootstrap');

require('./components/bootstrap');

var app = new Vue({
    mixins: [require('spark')],

    ready() {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            trigger: 'focus click'
        })
        $('body').on('click', function (e) {
            $('[data-toggle=popover]').each(function () {
                // hide any open popovers when the anywhere else in the body is clicked
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('hide');
                }
            });
        });
    }
});
