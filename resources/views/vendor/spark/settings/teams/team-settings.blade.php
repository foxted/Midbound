@extends('spark::layouts.app')

@section('scripts')
    @if (Spark::billsUsingStripe())
        <script src="https://js.stripe.com/v2/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
<spark-team-settings :user="user" :team-id="{{ $team->id }}" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <ul class="list-group spark-settings-tabs" role="tablist">
                    <!-- View All Teams -->
                    <li role="presentation" class="list-group-item cta">
                        <a href="/settings#/teams">
                            <span><i class="fa fa-fw fa-btn fa-arrow-left"></i>View All Teams</span>
                        </a>
                    </li>

                    <li class="list-header" v-if="team && team.name">
                        @{{ team.name }} Settings
                    </li>
                    <!-- Owner Settings -->
                    @if (Auth::user()->ownsTeam($team))
                    <li role="presentation" class="list-group-item active">
                        <a href="#owner" aria-controls="owner" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-btn fa-edit"></i>Team Profile
                        </a>
                    </li>
                    @endif

                <!-- Membership -->
                    @if (Auth::user()->ownsTeam($team))
                    <li role="presentation" class="list-group-item">
                    @else
                    <li role="presentation" class="list-group-item active">
                    @endif
                        <a href="#membership" aria-controls="membership" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-btn fa-users"></i>Membership
                        </a>
                    </li>

                </ul>
                @if (Spark::canBillTeams() && Auth::user()->ownsTeam($team))
                <ul class="list-group">
                    <li class="list-header">Billing</li>
                    @if (Spark::hasPaidTeamPlans())
                    <!-- Subscription Link -->
                        <li role="presentation" class="list-group-item">
                            <a href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscription
                            </a>
                        </li>
                    @endif

                    <!-- Payment Method Link -->
                    <li role="presentation" class="list-group-item">
                        <a href="#payment-method" aria-controls="payment-method" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-btn fa-credit-card"></i>Payment Method
                        </a>
                    </li>

                    <!-- Invoices Link -->
                    <li role="presentation" class="list-group-item">
                        <a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">
                            <i class="fa fa-fw fa-btn fa-history"></i>Invoices
                        </a>
                    </li>
                </ul>
                @endif
            </div>

            <!-- Tab Panels -->
            <div class="col-sm-9 col-md-10">
                <div class="tab-content">
                    <!-- Owner Information -->
                    @if (Auth::user()->ownsTeam($team))
                        <div role="tabpanel" class="tab-pane active" id="owner">
                            @include('spark::settings.teams.team-profile')
                        </div>
                    @endif

                    <!-- Membership -->
                    @if (Auth::user()->ownsTeam($team))
                    <div role="tabpanel" class="tab-pane" id="membership">
                    @else
                    <div role="tabpanel" class="tab-pane active" id="membership">
                    @endif
                        <div v-if="team">
                            @include('spark::settings.teams.team-membership')
                        </div>
                    </div>

                    <!-- Billing Tab Panes -->
                    @if (Spark::canBillTeams() && Auth::user()->ownsTeam($team))
                        @if (Spark::hasPaidTeamPlans())
                            <!-- Subscription -->
                            <div role="tabpanel" class="tab-pane" id="subscription">
                                <div v-if="user && team">
                                    @include('spark::settings.subscription')
                                </div>
                            </div>
                        @endif

                        <!-- Payment Method -->
                        <div role="tabpanel" class="tab-pane" id="payment-method">
                            <div v-if="user && team">
                                @include('spark::settings.payment-method')
                            </div>
                        </div>

                        <!-- Invoices -->
                        <div role="tabpanel" class="tab-pane" id="invoices">
                            <div v-if="user && team">
                                @include('spark::settings.invoices')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</spark-team-settings>
@endsection
