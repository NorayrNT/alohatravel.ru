@extends('layouts.app')

@section('content')
    <div id="userAccount">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <ul class="acc_tabs">
                        <li class="active_tab" data-id="userMain">profile</li>
                        <li data-id="userPassword">password</li>
                        <li class='acc_subscribe'>subscribe</li>
                        <li class="dontDoIt"><a href="/user/logout">logout</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 dataCol">
                    @include('errors.validation')
                    @include('errors.session')
                    <div class="userMain">
                        <form action="/user/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type='hidden' name='change_cred' value='name' />
                            <div class="form-group row">
                                <div class="col-12 mb-3">
                                    @if($user)
                                        <input type='text' name='name' placeholder = "{{$user->name}}" value="{{old('name')}}" />
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    @if($user)
                                        <input type='email' name='email' placeholder = "{{$user->email}}" value="{{old('email')}}" />                                    
                                    @endif
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="user_img" class="userImg">
                                        <input  type='file' name='userImg' class="accAvatar" value="{{old('userImg')}}" />
                                        <i class="fas fa-arrow-circle-up fa-lg"></i>
                                        <span class="upImg">choose your avatar</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button class='ac_update'>update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="userPassword">
                        <form action="/user/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 mb-3">
                                    <input type='password' name='password' placeholder = '...new password' required  value="{{old('password')}}" />
                                </div>
                                <div class="col-12 mb-3">
                                    <input type='password' name='password_confirmation' placeholder = '...confirm password' required  value="{{old('password_confirmation')}}" />
                                </div>
                                <div class="col-12">
                                    <button class='ac_update'>update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection