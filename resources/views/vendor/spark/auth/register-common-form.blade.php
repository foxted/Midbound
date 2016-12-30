<section class="registration panel panel-default">
    <header class="panel-heading">
        <ul class="list-unstyled list-inline">
            <li class="active">Your Information</li>
        </ul>
    </header>
    <div class="panel-body">
        <form class="form-horizontal" role="form">
            <!-- Name -->
            <div class="form-group" :class="{'has-error': registerForm.errors.has('name')}">
                <label class="col-md-4 control-label">Full Name</label>

                <div class="col-md-6">
                    <input type="name" class="form-control" name="name" v-model="registerForm.name" autofocus>

                    <span class="help-block" v-show="registerForm.errors.has('name')">
                        @{{ registerForm.errors.get('name') }}
                    </span>
                </div>
            </div>

            <!-- E-Mail Address -->
            <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
                <label class="col-md-4 control-label">Email Address</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" v-model="registerForm.email">

                    <span class="help-block" v-show="registerForm.errors.has('email')">
                        @{{ registerForm.errors.get('email') }}
                    </span>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
                <label class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password" v-model="registerForm.password">

                    <span class="help-block" v-show="registerForm.errors.has('password')">
                        @{{ registerForm.errors.get('password') }}
                    </span>
                </div>
            </div>

            <!-- Organization -->
            <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}">
                <label class="col-md-4 control-label">Organization</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="team"
                           v-model="registerForm.team"
                           placeholder="My Company Inc." autofocus>

                    <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
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
                    @{{ registerForm.errors.get('website') }}
                </span>
                </div>
            </div>

            <div v-if=" ! selectedPlan || selectedPlan.price == 0">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                            <span v-if="registerForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Registering
                            </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>&nbsp;Register
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
