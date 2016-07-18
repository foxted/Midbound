@extends('spark::layouts.app')

@section('content')
<prospects-index :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-header">Saved Searches</div>
                    <a href="#" class="list-group-item">Most Recent</a>
                    <a href="#" class="list-group-item active">Most Engaged</a>
                    <a href="#" class="list-group-item">Newly Added</a>
                    <a href="#" class="list-group-item cta"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Lead</th>
                                {{--<th>Company</th>--}}
                                {{--<th>Score</th>--}}
                                <th>Latest Activity</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="prospect in prospects">
                                <td>
                                    <h4 style="margin: 0">@{{ prospect.name }}</h4>
                                    <small>@{{ prospect.email }}</small>
                                </td>
                                {{--<td>--}}
                                    {{--Acme Inc.--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<span class="label label-default">--}}
                                        {{--4--}}
                                    {{--</span>--}}
                                {{--</td>--}}
                                <td>
                                    @{{ prospect.latest_activity.date | human }}
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-default" :href="prospect.url">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</prospects-index>
@endsection