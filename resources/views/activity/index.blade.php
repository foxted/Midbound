@extends('spark::layouts.app')

@section('content')
<activity :user="user" :team="currentTeam" filter="{{ $filter }}" inline-template>
    <div class="container">
        <div class="row">
            @include('activity.partials.filters')
            <div v-if="!loading">
                <!-- If events have been tracked -->
                @include('activity.partials.events')
                <!-- If NO events have been tracked -->
                @include('activity.partials.no-events')
            </div>
            <div class="text-center text-muted" v-else>
                <i class="fa fa-pulse fa-spinner fa-3x"></i>
            </div>
        </div>
    </div>
</activity>
@endsection