Vue.component('spark-websites-list', {
    props: ['websites'],

    /**
     * The component's data.
     */
    data() {
        return {
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
        editUrl(website) {
            this.beforeEditCache = website.url;
            this.editingWebsite = website;
        },

        /** 
        *
        */
        doneEditUrl(website) {
            if (!this.editingWebsite) {
                return
            }
            this.editingWebsite = null;
            if (website.url != this.beforeEditCache) {
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
    },

    // a custom directive to wait for the DOM to be updated
    // before focusing on the input field.
    // directives: {
    //     'url-focus': function (el, value) {
    //         if (value) {
    //             el.focus();
    //         }
    //     }
    // }
});



