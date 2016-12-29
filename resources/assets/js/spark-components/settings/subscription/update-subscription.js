import { find } from 'lodash';

var base = require('settings/subscription/update-subscription');

Vue.component('spark-update-subscription', {
    mixins: [base],
    data() {
        return {
            selectedLimit: 1000
        }
    },
    mounted() {
        Vue.nextTick(() => {
            $('[data-toggle="tooltip"]').tooltip();
        });
        this.selectedLimit = this.activePlan.attributes.limit;
    },
    computed: {
        basicPlan() {
            if(this.plans && this.plans.length > 0) {
                return find(this.plans, { attributes: { category: 'basic', limit: this.selectedLimit } });
            }

            return null;
        },
        proPlan() {
            if(this.plans && this.plans.length > 0) {
                return find(this.plans, { attributes: { category: 'pro', limit: this.selectedLimit } });
            }

            return null;
        },
    },
    methods: {
        updateLimit(limit) {
            this.selectedLimit = limit;
        },
    }
});
