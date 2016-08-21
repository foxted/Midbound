import './filters';

require('spark-bootstrap');

require('./components/bootstrap');

var app = new Vue({
    mixins: [require('spark')],

    ready() {
        $('[data-toggle="popover"]').popover({
            container: 'body',
            trigger: 'focus hover'
        })
    }
});
