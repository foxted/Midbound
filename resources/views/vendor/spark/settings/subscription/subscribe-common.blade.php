<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
            Subscribe
        </div>

        <!-- Interval Selector Button Group -->
        <div class="pull-right">
            <div class="btn-group" v-if="hasMonthlyAndYearlyPaidPlans">
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

    <div class="panel-body table-responsive">
        <!-- Subscription Notice -->
        <div class="p-b-lg">
            You are not subscribed to a plan. Choose from the plans below to get started.
        </div>

        <!-- European VAT Notice -->
        @if (Spark::collectsEuropeanVat())
            <p class="p-b-lg">
                All subscription plan prices are excluding applicable VAT.
            </p>
        @endif

        <!-- Plan Error Message -->
        <div class="alert alert-danger" v-if="form.errors.has('plan')">
            @{{ form.errors.get('plan') }}
        </div>

        <div class="plans">
            <div class="prospect-count">
                <p>
                    <strong>
                        Number of
                        <span class="hover-info" data-toggle="tooltip" data-placement="top"
                              title="Number of prospects that you are tracking and/or actively engaged with at any one time.">
                                Active Prospects
                            </span>
                    </strong></p>
                <div v-for="limit in spark.plans.limits" class="radio">
                    <label :class="{ 'active': limit == selectedLimit }" v-if="limit > 0">
                        <input type="radio" name="prospects" @click="updateLimit(limit)" :checked="
                        limit == selectedLimit">
                        Up to @{{ limit | numberFormat }}
                    </label>
                    <label :class="{ 'active': limit == selectedLimit }" v-else>
                        <input type="radio" name="prospects" @click="updateLimit(limit)" :checked="
                        limit == selectedLimit">
                        More than 10 000
                    </label>
                </div>
            </div>
            <div class="panel panel-plan">
                <div class="panel-heading basic">
                    <h2>@{{ basicPlan.name }}</h2>
                    <p class="plan-description">Track every prospect's every move.</p>
                    <div class="text-small">
                        <span class="dollar">$</span>
                        <span>@{{ basicPlan.price }}/@{{ basicPlan.interval }}</span>
                    </div>
                </div>
                <div class="panel-body">
                    <ul>
                        <li data-toggle="tooltip" data-placement="left"
                            title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">
                                <span class="hover-info">
                                    Capture <strong>New Prospects</strong>
                                </span>
                        </li>
                        <li data-toggle="tooltip" data-placement="left"
                            title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">
                                <span class="hover-info">
                                    Track Prospect <strong>Activity</strong>
                                </span>
                        </li>
                        <li data-toggle="tooltip" v-if="selectedLimit > 0"
                            data-placement="left" title="You can track up to @{{ selectedLimit }} prospects">
                                <span class="hover-info">
                                    <strong>Up to @{{ selectedLimit | numberFormat }}</strong> Prospects
                                </span>
                        </li>
                        <li data-toggle="tooltip" v-else
                            data-placement="left" title="You can track an unlimited number of prospects">
                                <span class="hover-info">
                                    <strong>Unlimited</strong> Prospects
                                </span>
                        </li>
                        <li data-toggle="tooltip" data-placement="left"
                            title="Add as many people from your marketing and sales teams as you'd like.">
                                <span class="hover-info">
                                    <strong>Unlimited</strong> Users
                                </span>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary-outline btn-block btn-lg"
                            v-if="selectedPlan && selectedPlan.id == basicPlan.id"
                            @click="selectedPlan = null">
                        Selected <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-primary btn-block btn-lg"
                            @click="selectPlan(basicPlan)"
                            v-else>
                        Select
                    </button>
                </div>
            </div>
            <div class="panel panel-plan">
                <div class="panel-heading pro">
                    <h2>@{{ proPlan.name }}</h2>
                    <p class="plan-description">Automate your prospect engagement.</p>
                    <div class="text-small">
                        <span class="dollar">$</span>
                        <span>@{{ proPlan.price }}/@{{ proPlan.interval }}</span>
                    </div>
                </div>
                <div class="panel-body">
                    <ul>
                        <li data-toggle="tooltip" data-placement="right"
                            title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">
                                <span class="hover-info">
                                    Capture <strong>New Prospects</strong>
                                </span>
                        </li>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">
                                <span class="hover-info">
                                    Track Prospect <strong>Activity</strong>
                                </span>
                        </li>
                        <li data-toggle="tooltip" v-if="selectedLimit > 0"
                            data-placement="left" title="Track up to @{{ selectedLimit }} prospects">
                                <span class="hover-info">
                                    <strong>Up to @{{ selectedLimit | numberFormat }}</strong> Prospects
                                </span>
                        </li>
                        <li data-toggle="tooltip" v-else
                            data-placement="left" title="You can track an unlimited number of prospects">
                                <span class="hover-info">
                                    <strong>Unlimited</strong> Prospects
                                </span>
                        </li>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Add as many people from your marketing and sales teams as you'd like.">
                                <span class="hover-info">
                                    <strong>Unlimited</strong> Users
                                </span>
                        </li>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Create flows that are a series of personalized, auto emails and other steps, such as phone calls and LinkedIn messages.">
                                <span class="hover-info">
                                    <strong>Unlimited Flows</strong>
                                </span>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    {{--<button class="btn btn-primary-outline btn-block btn-lg"--}}
                            {{--v-if="selectedPlan && selectedPlan.id == proPlan.id"--}}
                            {{--@click="selectedPlan = null">--}}
                        {{--Selected <i class="fa fa-check"></i>--}}
                    {{--</button>--}}
                    {{--<button class="btn btn-primary btn-block btn-lg"--}}
                            {{--@click="selectPlan(proPlan)"--}}
                            {{--v-else>--}}
                        {{--Select--}}
                    {{--</button>--}}
                    <button class="btn btn-primary btn-block btn-lg" disabled>
                        Coming Soon!
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
