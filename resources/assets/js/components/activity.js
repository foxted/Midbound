import moment from 'moment';

Vue.component('activity', {

    props: ['user'],

    mixins: [require('./../spark/mixins/tab-state')],

    data() {
        return {
            loading: true,
            pagination: null,
            prospects: [],
            filter: null
        }
    },

    computed: {
        endpoint() {
            let endpoint = '/api/activity';

            if(this.filter) {
                return `${endpoint}?filter=${this.filter}`;
            }

            return endpoint;
        },
        paginatedEndpoint() {
            let endpoint = `/api/activity?page=${this.pagination.current_page+1}`;

            if(this.filter) {
                return `${endpoint}&filter=${this.filter}`;
            }

            return endpoint;
        }
    },

    ready() {
        this.filter = this.getParameterByName('filter');
        this.$http.get(this.endpoint).then((response) => {
            this.prospects = response.data.data;
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
            this.$http.get(this.paginatedEndpoint).then((response) => {
                this.prospects = this.prospects.concat(response.data.data);
                delete response.data.data;
                this.pagination = response.data;
                $($event.target).button('reset');
            });
        },

        getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
    }
});
