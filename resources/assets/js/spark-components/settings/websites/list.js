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
                url: '',
                error: ''
            }),
            deleteWebsiteForm: new SparkForm({}),
            emailDeveloperForm: new SparkForm({
                email: ''
            }),
        }
    },

    methods: {
       isValidDomain(url) {
            if (!url) return false;
            //var re = /^((http||https):\/\/)(?!:\/\/)([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?$/gi;
            var re = /^(http[s]?\:\/\/)?(?!:\/\/)([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?$/gi;
            return re.test(url);
        },

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
            this.editingWebsite = null;
            if (!this.isValidDomain(website.url)) {
                this.websiteUrlForm.error = 'The url format is invalid';
                this.editingWebsite  = website;
                return
            }
            this.websiteUrlForm.error = '';
            if (website.url != this.beforeEditCache) {
                this.websiteUrlForm.url = website.url;
                Spark.put(`/api/websites/${website.id}`, this.websiteUrlForm);
                this.websiteUrlForm.error = '';
                this.websiteUrlForm.url = '';
            } 
      
        },


        /**
         * Cancel the edit website url .
         */
        cancelEditUrl(website) {
            this.editingWebsite = null;
            this.websiteUrlForm.url = '';
            this.websiteUrlForm.error = '';
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