import Vue from 'vue';
import moment from 'moment';

Vue.filter('human', function (value, format = 'YYYY-MM-DD HH:mm:ss') {
    return moment(value, format).fromNow(false);
})