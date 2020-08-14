<form id='loginForm' action="/login" method='post' enctype='multipart/form-data' class="wow slideInRight" data-wow-duration='.5s'>
    @csrf
    <div class="inner_form">
        <div class="form-group row">
            <div class="col-12 col-sm-6"><input type='email' name='email' placeholder = "...{{__('email')}}" required /></div>
            <div class="col-12 col-sm-6">
                <input type='password' name='password' placeholder = "...{{__('password')}}" />
                <p class='resetForm'>{{ucfirst(__('forgot'))}} ?</p>
            </div>
        </div>
        <div class="form-group row mb-0"><div class="col-12"><button class="log_sub_btn" >{{__('login')}}</button></div></div>
        <div class="have_account"><span>{{ucfirst(__('no account'))}} ?</span> | <span class='regForm'>{{ucfirst(__('register'))}}</span></div> 
    </div>
</form>