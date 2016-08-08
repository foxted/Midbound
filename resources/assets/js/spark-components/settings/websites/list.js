Vue.component('spark-websites-list', {
    props: ['websites'],

    /**
     * The component's data.
     */
    data() {
        return {
            showingWebsite: null,
            deletingWebsite: null,

            updateWebsiteForm: new SparkForm({
                name: '',
            }),

            deleteWebsiteForm: new SparkForm({})
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
        }
    }
});