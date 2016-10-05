@extends('layouts.guest')

@section('title')
    Plans &amp; Pricing | Midbound
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>Plans &amp; Pricing</h2>
            <p class="lead">With <strong>unlimited users on all plans</strong>, enjoy the freedom the grow.</p>
        </div>
    </div>

    <div class="container">
        <plans inline-template>
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
                    <div v-for="plan in plans" class="radio">
                        <label :class="{ 'active': plan.limit == selectedPlan.limit }" v-if="plan.limit > 0">
                            <input type="radio" name="prospects" @click="updatePrice(plan)" :checked="plan.limit == selectedPlan.limit">
                            Up to @{{ plan.limit | currency '' }}
                        </label>
                        <label :class="{ 'active': plan.limit == selectedPlan.limit }" v-else>
                            <input type="radio" name="prospects" @click="updatePrice(plan)" :checked="plan.limit == selectedPlan.limit">
                            More than 10,000
                        </label>
                    </div>
                </div>
                <div class="panel panel-plan">
                    <div class="panel-heading basic">
                        <h2>Basic</h2>
                        <p class="plan-description">Track every prospect's every move.</p>
                        <div class="text-small">
                            <span class="dollar">$</span>
                            <span v-if="selectedPlan.limit > 0">@{{ selectedPlan.basicPrice }}/mo</span>
                            <span v-else>Custom pricing</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li class="hover-info" data-toggle="tooltip" data-placement="left"
                                title="Add as many people from your marketing and sales teams as you'd like.">
                                <strong>Unlimited</strong>
                                Users
                            </li>
                            <li class="hover-info" data-toggle="tooltip" data-placement="left"
                                title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">
                                Capture <strong>New Prospects</strong>
                            </li>
                            <li class="hover-info" data-toggle="tooltip" data-placement="left"
                                title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">
                                Track Prospect <strong>Activity</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer" v-if="selectedPlan.limit > 0">
                        <a class="btn btn-primary btn-block btn-lg" href="{{ route('auth.register') }}">Start 30-Day Free Trial</a>
                        <div class="cta-description">No Credit Card Required</div>
                    </div>
                    <div class="panel-footer" v-else>
                        <a class="btn btn-primary" href="#">
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="panel panel-plan">
                    <div class="panel-heading pro">
                        <h2>Pro</h2>
                        <p class="plan-description">Automate your prospect engagement.</p>
                        <div class="text-small">
                            <span class="dollar">$</span>
                            <span>@{{ selectedPlan.proPrice }}/mo</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li class="hover-info" data-toggle="tooltip" data-placement="right"
                                title="Add as many people from your marketing and sales teams as you'd like.">
                                <strong>Unlimited</strong>
                                Users
                            </li>
                            <li class="hover-info" data-toggle="tooltip" data-placement="right"
                                title="When your website visitors fill out forms on your website, they will automatically appear in Midbound.">
                                Capture <strong>New Prospects</strong>
                            </li>
                            <li class="hover-info" data-toggle="tooltip" data-placement="right"
                                title="Capture all past and future prospect events so you have a full history of activity to review for each prospect.">
                                Track Prospect <strong>Activity</strong>
                            </li>
                            <li class="hover-info" data-toggle="tooltip" data-placement="right"
                                title="Create flows that are a series of personalized, auto emails and other steps, such as phone calls and LinkedIn messages.">
                                <strong>Unlimited Flows</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer" v-if="selectedPlan.limit > 0">
                        <a class="btn btn-primary btn-block btn-lg" href="{{ route('auth.register') }}">Start 30-Day Free Trial</a>
                        <div class="cta-description">No Credit Card Required</div>
                    </div>
                    <div class="panel-footer" v-else>
                        <a class="btn btn-primary" href="#">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </plans>
    </div>
@stop