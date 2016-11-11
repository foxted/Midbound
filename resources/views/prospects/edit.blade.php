@extends('spark::layouts.app')

@section('content')
    <prospects-index :user="user" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ route('app.prospects.update', $prospect) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Edit information</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"
                                               value="{{ old('name', $prospect->name) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="name">Email</label>
                                        <input type="text" name="email" class="form-control"
                                               value="{{ old('email', $prospect->email) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                               value="{{ old('phone', $prospect->phone) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="company">Company</label>
                                        <input type="text" name="company" class="form-control"
                                               value="{{ old('company', $prospect->company) }}"
                                               placeholder="Acme Inc.">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="#" class="btn btn-ghost pull-right">Back to prospect details</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </prospects-index>
@endsection