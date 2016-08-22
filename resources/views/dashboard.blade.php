@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @php
                            $methods = get_class_methods(Auth::user()->currentTeam());
                        @endphp
                        <ul>
                        @foreach($methods as $method)
                            <li>{{ $method }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
