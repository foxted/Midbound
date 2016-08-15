Vue.component('install-website', {

    props: ['user', 'websiteUrl'],

    data() {
        return {
            website: null,
            emailDeveloperForm: new SparkForm({
                email: ''
            }),
        }
    },

    ready() {
        this.$http.get(this.websiteUrl).then(({ data: website }) => {
            this.website = website;
        });
        $('#email-developer').on('hidden.bs.modal', () => {
            this.emailDeveloperForm.success = false;
            this.emailDeveloperForm.busy = false;
            this.emailDeveloperForm.errors.forget();
            this.emailDeveloperForm.email = '';
        })
    },

    methods: {
        showEmailDeveloperForm() {
            $('#email-developer').modal('show');
        },

        showMoreInformation($event) {
            $($event.target).popover();
        },

        sendEmail() {
            this.emailDeveloperForm.busy = true;
            this.emailDeveloperForm.errors.forget();

            Spark.post(`/api/email-developer/${this.website.id}`, this.emailDeveloperForm)
                .then(response => {
                    this.busy = false;
                    this.success = true;
                    $('#email-developer').modal('hide');
                })
        }
    }

});