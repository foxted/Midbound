import moment from 'moment';

Vue.component('activity', {

    props: ['user'],

    mixins: [require('./../spark/mixins/tab-state')],

    data() {
        return {
            loading: true,
            pagination: null,
            events: []
        }
    },

    ready() {
        this.usePushStateForTabs('.filter-tabs');
        this.$http.get('/api/activity').then((response) => {
            this.events = response.data.data;
            delete response.data.data;
            this.pagination = response.data;
            this.loading = false;
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
