import { find } from 'lodash';
import Payment from 'payment';

var base = require('settings/subscription/subscribe-stripe');

Vue.component('spark-subscribe-stripe', {
    mixins: [base],

    watch: {
        expiry(value) {
            let expiry = Payment.fns.cardExpiryVal(value);

            if(expiry.month) {
                this.cardForm.month = expiry.month;
            } else {
                this.cardForm.month = '';
            }

            if(expiry.year) {
                this.cardForm.year = expiry.year;
            } else {
                this.cardForm.year = '';
            }
        }
    },

    data() {
        return {
            expiry: '',
            selectedLimit: 1000
        };
    },

    mounted() {
        Vue.nextTick(() => {
            $('[data-toggle="tooltip"]').tooltip();
        });
        this.initializeForm();
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

        /**
         * Get the new card brand
         */
        cardType() {
            return Payment.fns.cardType(this.cardForm.number);
        },

        /**
         * Get the proper brand icon for the customer's credit card.
         */
        cardIcon() {
            if (! this.billable.card_brand) {
                return 'fa-cc-stripe';
            }

            switch (this.billable.card_brand) {
                case 'American Express':
                    return 'fa-cc-amex';
                case 'Diners Club':
                    return 'fa-cc-diners-club';
                case 'Discover':
                    return 'fa-cc-discover';
                case 'JCB':
                    return 'fa-cc-jcb';
                case 'MasterCard':
                    return 'fa-cc-mastercard';
                case 'Visa':
                    return 'fa-cc-visa';
                default:
                    return 'fa-cc-stripe';
            }
        },
    },

    methods: {
        initializeForm() {
            Payment.formatCardNumber($('.subscribe-form input[data-stripe="number"]'));
            Payment.formatCardExpiry($('.subscribe-form input[data-stripe="exp"]'));
            Payment.formatCardCVC($('.subscribe-form input[data-stripe="cvc"]'));
        },

        updateLimit(limit) {
            this.selectedLimit = limit;
        },

        /**
         * Mark the given plan as selected.
         */
        selectPlan(plan) {
            this.selectedPlan = plan;
            this.form.plan = this.selectedPlan.id;
            this.$nextTick(() => {
                $(document).scrollTop( $("#billing-information").offset().top );
            });
        },
    }
});
