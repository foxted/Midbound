import Vue from 'vue';
import moment from 'moment';

Vue.filter('human', function (value, format = 'YYYY-MM-DD HH:ii:ss.SSSSSS') {
    return moment(value, format).fromNow();
})