Vue.component('spark-create-website', {
    /**
     * The component's data.
     */
    data() {
        return {
            showingWebsite: null,

            form: new SparkForm({
                url: ''
            })
        };
    },

    methods: {
        /**
         * Create a new website.
         */
        create() {
            Spark.post('/api/websites', this.form)
                .then(response => {
                    this.showWebsite(response);

                    this.resetForm();

                    this.$emit('updateWebsites');
                });
        },


        /**
         * Display the website to the user.
         */
        showWebsite(website) {
            this.showingWebsite = website;

            $('#modal-show-website').modal('show');
        },


        /**
         * Reset the website form back to its default state.
         */
        resetForm() {
            this.form.url = '';
        }
    }
});