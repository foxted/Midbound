<spark-update-payment-method-stripe :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="panel panel-default">
        <!-- Update Payment Method Heading -->
        <div class="panel-heading">
            <div class="pull-left">
                Update Payment Method
            </div>

            <div class="pull-right" v-if="billable.card_last_four">
                <a href="#" class="btn-link" v-if="!updating" @click.prevent="toggleUpdate">Update</a>
                <a href="#" class="btn-link" v-else @click.prevent="toggleUpdate">Cancel</a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <!-- Card Update Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your card has been updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
            <div class="alert alert-danger" v-if="form.errors.has('form')">
                We had trouble updating your card. It's possible your card provider is preventing
                us from charging the card. Please contact your card provider or customer support.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <span v-if="billable.card_last_four && !updating">
                <i class="fa fa-btn @{{ cardIcon }}"></i>
                Card ending in @{{ billable.card_last_four }}
            </span>

            <form class="form-horizontal update-form" role="form" v-if="updating || !billable.card_last_four">
                <!-- Billing Address Fields -->
                @if (Spark::collectsBillingAddress())
                    <h2><i class="fa fa-btn fa-map-marker"></i>Billing Address</h2>

                    @include('spark::settings.payment-method.update-payment-method-address')

                    <h2><i class="fa fa-btn fa-credit-card"></i>Credit Card</h2>
                @endif

                <!-- Cardholder's Name -->
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Cardholder's Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" v-model="cardForm.name" autofocus>
                    </div>
                </div>

                <!-- Card Number -->
                <div class="form-group" :class="{'has-error': cardForm.errors.has('number')}">

                    <label for="number" class="col-md-4 control-label">Card Information</label>

                    <div class="col-md-6">
                        <i v-if="cardType" class="fa fa-input fa-cc-@{{ cardType }}"></i>
                        <input type="text"
                            class="form-control"
                            data-stripe="number"
                            :placeholder="placeholder"
                            v-model="cardForm.number">
                    </div>
                </div>

                <!-- Security Code & Expiration -->
                <div class="form-group" :class="{'has-error': cardForm.errors.has('number')}">
                    <label for="cvc" class="col-md-4 control-label"></label>

                    <div class="col-md-3">
                        <input type="text" class="form-control"
                               placeholder="MM / YY" data-stripe="exp" v-model="expiry">
                    </div>

                    <div class="col-md-3">
                        <input type="text" placeholder="CVC" class="form-control" data-stripe="cvc" v-model="cardForm.cvc">
                    </div>

                    <span class="col-md-6 col-md-offset-4 help-block" v-show="cardForm.errors.has('number')">
                        @{{ cardForm.errors.get('number') }}
                    </span>
                </div>

                <!-- Zip Code -->
                <div class="form-group" v-if=" ! spark.collectsBillingAddress">
                    <label for="zip" class="col-md-4 control-label">ZIP / Postal Code</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" v-model="form.zip">
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" @click.prevent="update" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                            </span>

                            <span v-else>
                                Update
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-payment-method-stripe>
