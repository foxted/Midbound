@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <registration inline-template>
            <div>
                <component :is="component" :component.sync="component"
                           :register-form.sync="registerForm"></component>
            </div>
        </registration>
    </div>
@stop