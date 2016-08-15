@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <registration inline-template>
            <div>
                <component :is="component" :component.sync="component"
                           :register-form.sync="registerForm" :email-developer-form.sync="emailDeveloperForm"
                           :website.sync="website"></component>
            </div>
        </registration>
    </div>
@stop