<spark-resume-subscription :user="user" :team="team" :plans="plans" :billable-type="billableType" inline-template>
    <section class="spark-resume-subscription">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
                    Resume Subscription
                </div>

                <!-- Interval Selector Button Group -->
                <div class="pull-right">
                    <div class="btn-group" v-if="hasMonthlyAndYearlyPlans">
                        <!-- Monthly Plans -->
                        <button type="button" class="btn btn-default"
                        @click="showMonthlyPlans" :class="{'active': showingMonthlyPlans}">
                        Monthly
                        </button>

                        <!-- Yearly Plans -->
                        <button type="button" class="btn btn-default"
                        @click="showYearlyPlans" :class="{'active': showingYearlyPlans}">
                        Yearly
                        </button>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="panel-body table-responsive">
                <!-- Plan Error Message - In General Will Never Be Shown -->
                <div class="alert alert-danger" v-if="planForm.errors.has('plan')">
                    @{{ planForm.errors.get('plan') }}
                </div>

                <!-- Cancellation Information -->
                <div class="p-b-lg">
                    You have cancelled your subscription to the
                    <strong>@{{ activePlan.name }} (@{{ activePlan.interval | capitalize }})</strong> plan.
                </div>

                <div class="p-b-lg">
                    The benefits of your subscription will continue until your current billing period ends on
                    <strong>@{{ activeSubscription.ends_at | date }}</strong>. You may resume your subscription at no
                    extra cost until the end of the billing period.
                </div>

                <!-- European VAT Notice -->
                @if (Spark::collectsEuropeanVat())
                    <p class="p-b-lg">
                        All subscription plan prices include applicable VAT.
                    </p>
                @endif

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
                                    data-placement="left"
                                    :title="'You can track up to ' + selectedLimit + ' prospects'">
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
                            <button class="btn btn-block btn-lg"
                                    :class="{ 'btn-primary-outline': !isActivePlan(plan), 'btn-primary': isActivePlan(plan) }"
                            @click="updateSubscription(plan)"
                            :disabled="selectingPlan" v-if="selectingPlan === basicPlan">
                            <i class="fa fa-btn fa-spinner fa-spin"></i>&nbsp;Resuming
                            </button>

                            <button class="btn btn-block btn-lg"
                                    :class="{'btn-primary-outline': ! isActivePlan(basicPlan), 'btn-primary': isActivePlan(basicPlan)}"
                            @click="updateSubscription(basicPlan)"
                            :disabled="selectingPlan" v-if="! isActivePlan(basicPlan) && selectingPlan !== basicPlan">
                            Switch
                            </button>

                            <button class="btn btn-block btn-lg"
                                    :class="{'btn-primary-outline': ! isActivePlan(basicPlan), 'btn-primary': isActivePlan(basicPlan)}"
                            @click="updateSubscription(basicPlan)"
                            :disabled="selectingPlan" v-if="isActivePlan(basicPlan) && selectingPlan !== basicPlan">
                            Resume
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
                                    data-placement="left" :title="'Track up to ' + selectedLimit + ' prospects'">
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
                            {{--<button class="btn btn-block btn-lg"--}}
                                    {{--:class="{ 'btn-primary-outline': !isActivePlan(proPlan), 'btn-primary': isActivePlan(proPlan) }"--}}
                            {{--@click="updateSubscription(proPlan)"--}}
                            {{--:disabled="selectingPlan" v-if="selectingPlan === proPlan">--}}
                            {{--<i class="fa fa-btn fa-spinner fa-spin"></i>&nbsp;Resuming--}}
                            {{--</button>--}}

                            {{--<button class="btn btn-block btn-lg"--}}
                                    {{--:class="{'btn-primary-outline': ! isActivePlan(proPlan), 'btn-primary': isActivePlan(proPlan)}"--}}
                            {{--@click="updateSubscription(proPlan)"--}}
                            {{--:disabled="selectingPlan" v-if="! isActivePlan(proPlan) && selectingPlan !== proPlan">--}}
                            {{--Switch--}}
                            {{--</button>--}}

                            {{--<button class="btn btn-block btn-lg"--}}
                                    {{--:class="{'btn-primary-outline': ! isActivePlan(proPlan), 'btn-primary': isActivePlan(proPlan)}"--}}
                            {{--@click="updateSubscription(proPlan)"--}}
                            {{--:disabled="selectingPlan" v-if="isActivePlan(proPlan) && selectingPlan !== proPlan">--}}
                            {{--Resume--}}
                            {{--</button>--}}
                            <button class="btn btn-primary btn-block btn-lg" disabled>
                                Coming Soon!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</spark-resume-subscription>
