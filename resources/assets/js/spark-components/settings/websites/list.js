Vue.component('spark-websites-list', {
    props: ['websites'],

    /**
     * The component's data.
     */
    data() {
        return {
            showingWebsite: null,
            deletingWebsite: null,
            deleteWebsiteForm: new SparkForm({}),
            emailDeveloperForm: new SparkForm({
                email: ''
            }),
        }
    },

    methods: {
        /**
         * Show the edit website modal.
         */
        viewWebsite(website) {
            this.showingWebsite = website;

            $('#modal-view-website').modal('show');
        },

        /**
         * Get user confirmation that the website should be deleted.
         */
        approveWebsiteDelete(website) {
            this.deletingWebsite = website;

            $('#modal-delete-website').modal('show');
        },


        /**
         * Delete the specified website.
         */
        deleteWebsite() {
            Spark.delete(`/api/websites/${this.deletingWebsite.id}`, this.deleteWebsiteForm)
                .then(() => {
                    this.$dispatch('updateWebsites');

                    $('#modal-delete-website').modal('hide');
                });
        },

        sendEmail() {
            this.emailDeveloperForm.busy = true;
            this.emailDeveloperForm.errors.forget();

            Spark.post(`/api/email-developer/${this.showingWebsite.id}`, this.emailDeveloperForm)
                .then(response => {
                    this.busy = false;
                    this.emailDeveloperForm.email = '';
                    $('#modal-view-website').modal('hide');
                })
        }
    }
});