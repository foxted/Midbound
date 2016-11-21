import Vue from 'vue';
import moment from 'moment';
import accounting from 'accounting';


Vue.filter('human', function (value, format = 'YYYY-MM-DD HH:mm:ss') {
    return moment(value, format).fromNow(false);
});

Vue.filter('numberFormat', function (value) {
    return accounting.formatNumber(value, 0, ' ');
});