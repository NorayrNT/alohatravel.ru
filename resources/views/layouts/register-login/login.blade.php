@extends('layouts.app')

@section('content')
    <div id="register_block">  
        <div class="container" id="loginBlock">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-8">
                    @include('errors.validation')
                    @include('errors.session')
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    @include('layouts.register-login.login-form')
                    @include('layouts.register-login.register-form')
                    @include('layouts.register-login.password-reset-form')
                </div>
            </div>
        </div>
    </div>
@endsection