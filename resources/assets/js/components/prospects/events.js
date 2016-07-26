import moment from 'moment';

Vue.component('prospects-events', {

    props: ['user'],

    data() {
        return {
            pagination: null,
            events: []
        }
    },

    ready() {
        this.$http.get('/api/events').then((response) => {
            this.events = response.data.data;
            delete response.data.data;
            this.pagination = response.data;
        });
    },

    methods: {
        activity(date) {
            return moment(date).fromNow(true);
        },

        loadMore($event) {
            $($event.target).button('loading');
            this.$http.get(`/api/events?page=${this.pagination.current_page+1}`).then((response) => {
                this.events = this.events.concat(response.data.data);
                delete response.data.data;
                this.pagination = response.data;
                $($event.target).button('reset');
            });
        }
    }
});
