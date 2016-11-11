Vue.component('plans', {
    data() {
        return {
            selectedPlan: {},
            plans: [
                { limit: 250, basicPrice: 19.99, proPrice: 49.99 },
                { limit: 500, basicPrice: 35.99, proPrice: 89.99 },
                { limit: 1000, basicPrice: 59.99, proPrice: 149.99 },
                { limit: 2000, basicPrice: 79.99, proPrice: 199.99 },
                { limit: 5000, basicPrice: 99.99, proPrice: 249.99 },
                { limit: 10000, basicPrice: 119.99, proPrice: 299.99 },
                { limit: -1 }
            ]
        };
    },

    ready() {
        this.selectedPlan = {limit: 1000, basicPrice: 59.99, proPrice: 149.99};
    },

    methods: {
        updatePrice(plan) {
            this.selectedPlan = plan;
        }
    }
});
