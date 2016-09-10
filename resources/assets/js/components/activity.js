import moment from 'moment';
import { reject } from 'lodash';

Vue.component('activity', {

    props: ['user', 'filter'],

    mixins: [require('./../spark/mixins/tab-state')],

    data() {
        return {
            loading: true,
            pagination: null,
            prospects: []
        }
    },

    computed: {
        endpoint() {
            let endpoint = '/api/activity';

            if(this.filter) {
                return `${endpoint}/${this.filter}`;
            }

            return endpoint;
        },
        paginatedEndpoint() {
            return `${this.endpoint}/${this.pagination.current_page+1}`;
        }
    },

    ready() {
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

        track(prospect) {
            this.$http.put(`/api/prospects/${prospect.id}`, {is_ignored: false}).then(() => {
                reject(this.prospects, prospect);
            });
        },

        ignore(prospect) {
            this.$http.put(`/api/prospects/${prospect.id}`, {is_ignored: true}).then(() => {
                reject(this.prospects, prospect);
            });
        }
    }
});
