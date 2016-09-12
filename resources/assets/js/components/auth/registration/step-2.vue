<template>
    <div>
        <section class="registration step-2 panel panel-default">
            <header class="panel-heading">
                <ul class="list-unstyled list-inline">
                    <li>1. Your Information</li>
                    <li class="active">2. Your Organization</li>
                </ul>
            </header>
            <main class="panel-body">
                <form action="#" method="POST" class="form-horizontal">
                    <!-- Organization -->
                    <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}">
                        <label class="col-md-4 control-label">Organization</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="team"
                                   v-model="registerForm.team"
                                   placeholder="My Company Inc." autofocus>

                            <span class="help-block" v-show="registerForm.errors.has('team')">
                                {{ registerForm.errors.get('team') }}
                            </span>
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="form-group" :class="{'has-error': registerForm.errors.has('website')}">
                        <label class="col-md-4 control-label">Website</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="website" v-model="registerForm.website"
                                   placeholder="http://www.mywebsite.com">
                            <span class="help-block" v-show="registerForm.errors.has('website')">
                                {{ registerForm.errors.get('website') }}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                                <span v-if="registerForm.busy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>Creating account...
                                </span>

                                <span v-else>
                                    Create account
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </main>
            <footer class="panel-footer text-center">
                <p>Already have an account? <a href="/login">Log In</a></p>
            </footer>
        </section>
    </div>
</template>

<script type="text/ecmascript-6">

    export default {

        props: ['component', 'registerForm', 'emailDeveloperForm', 'website'],

        ready() {
            $('input').first().focus();
        },

        methods: {
            /**
             * Attempt to register with the application.
             */
            register() {
                this.sendRegistration();
            },

            /*
             * After obtaining the Stripe token, send the registration to Spark.
             */
            sendRegistration() {
                Spark.post('/register', this.registerForm).then(response => {
                    console.log(response);
                    //window.location = response.redirectUrl;
                }).catch(errors => {
                    this.busy = false;
                    this.errors = errors.data;
                    if (this.registerForm.errors.has('email')
                            || this.registerForm.errors.has('name')
                            || this.registerForm.errors.has('password')) {

                        this.component = 'step-1';
                    }
                });
            }

        }

    }

</script>