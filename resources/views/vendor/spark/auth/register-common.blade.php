<!-- Basic Profile -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="page-header" v-if="invitation">
            <h2>Join the @{{ invitation.team.name }} team!</h2>
            <p>Find out why the world's most nimble sales teams prefer Midbound.</p>
        </div>
        <div class="page-header" v-else>
            <h2>Create Your Free Account</h2>
            <p>Find out why the world's most nimble sales teams prefer Midbound.</p>
        </div>

        <!-- Coupon -->
        <div class="panel panel-success" v-if="coupon">
            <div class="panel-heading">Discount</div>

            <div class="panel-body">
                The coupon's @{{ discount }} discount will be applied to your subscription!
            </div>
        </div>

        <!-- Invalid Coupon -->
        <div class="alert alert-danger" v-if="invalidCoupon">
            Whoops! This coupon code is invalid.
        </div>

        <!-- Invalid Invitation -->
        <div class="alert alert-danger" v-if="invalidInvitation">
            Whoops! This invitation code is invalid.
        </div>

        <!-- Plan Selection -->
        <div class="panel panel-default" v-if="paidPlans.length > 0">
            <div class="panel-heading">
                <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
                    Subscription
                </div>

                <!-- Interval Selector Button Group -->
                <div class="pull-right">
                    <div class="btn-group" v-if="hasMonthlyAndYearlyPlans" style="padding-top: 2px;">
                        <!-- Monthly Plans -->
                        <button type="button" class="btn btn-default"
                        @click="showMonthlyPlans"
                        :class="{'active': showingMonthlyPlans}">

                        Monthly
                        </button>

                        <!-- Yearly Plans -->
                        <button type="button" class="btn btn-default"
                        @click="showYearlyPlans"
                        :class="{'active': showingYearlyPlans}">

                        Yearly
                        </button>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="panel-body spark-row-list">
                <!-- Plan Error Message - In General Will Never Be Shown -->
                <div class="alert alert-danger" v-if="registerForm.errors.has('plan')">
                    @{{ registerForm.errors.get('plan') }}
                </div>

                <!-- European VAT Notice -->
                @if (Spark::collectsEuropeanVat())
                    <p class="p-b-md">
                        All subscription plan prices are excluding applicable VAT.
                    </p>
                @endif

                <table class="table table-borderless m-b-none">
                    <thead></thead>
                    <tbody>
                    <tr v-for="plan in plansForActiveInterval">
                        <!-- Plan Name -->
                        <td>
                            <div class="btn-table-align" v-click="showPlanDetails(plan)">
                            <span style="cursor: pointer;">
                                <strong>@{{ plan.name }}</strong>
                            </span>
                            </div>
                        </td>

                        <!-- Plan Features Button -->
                        <td>
                            <button class="btn btn-default m-l-sm" @click="showPlanDetails(plan)">
                            <i class="fa fa-btn fa-star-o"></i>Plan Features
                            </button>
                        </td>

                        <!-- Plan Price -->
                        <td>
                            <div class="btn-table-align">
                                <span v-if="plan.price == 0">
                                    Free
                                </span>

                                <span v-else>
                                    @{{ plan.price | currency spark.currencySymbol }}
                                    / @{{ plan.interval | capitalize }}
                                </span>
                            </div>
                        </td>

                        <!-- Trial Days -->
                        <td>
                            <div class="btn-table-align" v-if="plan.trialDays">
                                @{{ plan.trialDays}} Day Trial
                            </div>
                        </td>

                        <!-- Plan Select Button -->
                        <td class="text-right">
                            <button class="btn btn-primary btn-plan" v-if="isSelected(plan)" disabled>
                                <i class="fa fa-btn fa-check"></i>Selected
                            </button>

                            <button class="btn btn-primary-outline btn-plan" @click="selectPlan(plan)" v-else>
                            Select
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Invitation Code Error -->
        <div class="alert alert-danger" v-if="registerForm.errors.has('invitation')">
            @{{ registerForm.errors.get('invitation') }}
        </div>

        <!-- Registration Form -->
        @include('spark::auth.register-common-form')
    </div>
</div>
