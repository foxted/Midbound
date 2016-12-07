Vue.component('newsletter', {
    data() {
        return {
            success: false,
            errors: null,
            busy: false,
            email: ''
        };
    },

    methods: {
        subscribe() {
            this.busy = true;
            this.$http.post('/api/newsletter', { email: this.email })
                .then(this.displaySuccess)
                .catch(this.displayError);
        },

        displaySuccess(response) {
            this.email = '';
            this.busy = false;
            this.errors = false;
            this.success = true;

            setTimeout(() => {
                this.success = false;
            }, 4000);
        },

        displayError({ data }) {
            this.busy = false;
            this.errors = data;
        }
    }
});
