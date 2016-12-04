Vue.component('spark-websites-list', {
    props: ['websites'],

    /**
     * The component's data.
     */
    data() {
        return {
            editing: false,
            editingWebsite: null,
            showingWebsite: null,
            deletingWebsite: null,
            websiteUrlForm: new SparkForm({
                url: ''
            }),
            deleteWebsiteForm: new SparkForm({}),
            emailDeveloperForm: new SparkForm({
                email: ''
            }),
        }
    },

    computed: {
        validWebsiteUrl() {
            return this.editedWebsite.url != "";
        }
    },

    methods: {
        /**
         * Edit the specify website url .
         */
        toggleEditUrl(website, $event) {
            this.beforeEditCache = website.url;
            this.editingWebsite = website;
            if(this.editing || this.editingWebsite) {
                this.$nextTick(() => {
                    $($event.target).next('input').focus();
                });
            }
        },

        /** 
        *
        */
        doneEditUrl(website) {
            if (!this.editingWebsite) {
                return
            }
            if (website.url == "") {
                website.url = this.beforeEditCache;
                return
            }
            this.editingWebsite = null;
            if (website.url != this.beforeEditCache && website.url != "") {
                this.websiteUrlForm.url = website.url;
                Spark.put(`/api/websites/${website.id}`, this.websiteUrlForm)
                    .then(response => {
                       this.editingWebsite = null;
                    });
            } 
        },


        /**
         * Cancel the edit website url .
         */
        cancelEditUrl(website) {
            this.editingWebsite = null;
            website.url = this.beforeEditCache;
        },

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