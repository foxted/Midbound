import moment from 'moment';

Vue.component('prospects-index', {
    props: ['user'],

    data() {
        return {
            prospects: []
        }
    },

    ready() {
        this.$http.get('/api/prospects').then((response) => {
            this.prospects = response.data;
        });
    },

    methods: {
        activity(date) {
            console.log(date);
            return moment(date).fromNow(true);
        }
    }
});
