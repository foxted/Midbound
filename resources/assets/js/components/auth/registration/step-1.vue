<template>
    <div>
        <section class="registration step-1 panel panel-default">
            <header class="panel-heading">
                <ul class="list-unstyled list-inline" v-if="invitation">
                    <li class="active">Your Information</li>
                </ul>
                <ul class="list-unstyled list-inline" v-else>
                    <li class="active">1. Your Information</li>
                    <li>2. Your Organization</li>
                </ul>
            </header>
            <main class="panel-body">
                <form action="#" method="POST" class="form-horizontal">
                    <!-- Name -->
                    <div class="form-group" :class="{'has-error': registerForm.errors.has('name')}">
                        <label class="col-md-4 control-label">Full Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" v-model="registerForm.name" autofocus>

                            <span class="help-block" v-show="registerForm.errors.has('name')">
                                {{ registerForm.errors.get('name') }}
                            </span>
                        </div>
                    </div>

                    <!-- E-Mail Address -->
                    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
                        <label class="col-md-4 control-label">Email Address</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" v-model="registerForm.email">

                            <span class="help-block" v-show="registerForm.errors.has('email')">
                                {{ registerForm.errors.get('email') }}
                            </span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" v-model="registerForm.password">

                            <span class="help-block" v-show="registerForm.errors.has('password')">
                                {{ registerForm.errors.get('password') }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-primary" @click.prevent="register" v-if="invitation">
                                Register&nbsp;<i class="fa fa-btn fa-arrow-right"></i>
                            </button>
                            <button class="btn btn-primary" @click.prevent="nextStep" v-else>
                                Continue&nbsp;<i class="fa fa-btn fa-arrow-right"></i>
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

        props: ['component', 'invitation', 'registerForm', 'emailDeveloperForm', 'website'],

        watch: {
            invitation(value) {
                if(value) {
                    this.registerForm.email = this.invitation.email;
                }
            }
        },

        methods: {
            nextStep() {
                this.component = 'step-2';
            },

            /**
             * Attempt to register with the application.
             */
            register() {
                this.registerForm.busy = true;
                this.registerForm.errors.forget();

                this.sendRegistration();
            },

            /*
             * After obtaining the Stripe token, send the registration to Spark.
             */
            sendRegistration() {
                Spark.post('/register', this.registerForm).then(response => {
                    window.location = response.redirectUrl;
                }).catch(errors => {
                    this.busy = false;
                    this.errors = errors.data;
                });
            }
        }

    }

</script>