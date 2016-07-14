@extends('spark::layouts.app')

@section('content')
<prospects-index :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="#">New <span class="badge">14</span></a></li>
                            <li>
                                <a href="#">Active <span class="badge">5</span></a>
                                <ul id="subnav" class="nav" style="display: block; text-indent: 10px;">
                                    <li><a href="#">Past 24 Hours</a></li>
                                    <li><a href="#">Past 7 Days</a></li>
                                    <li><a href="#">Past 30 Days</a></li>
                                </ul>
                            </li>

                            <li><a href="#">All </a></li>
                            <li><a href="#">Ignored </a></li>
                        </ul>
                    </div>
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