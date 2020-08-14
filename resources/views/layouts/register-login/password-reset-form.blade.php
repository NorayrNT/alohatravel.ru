<form action="/password-reset" method="post" enctype="multipart/form-data" id="resetForm" class="d-none wow slideInRight" data-wow-duration='.5s'>
    @csrf
    <div class="inner_form">
        <div class="form-group row">
            <div class="col-12 col-sm-4"><input type='email' name='email' placeholder = "...{{__('email')}}" required /></div>
            <div class="col-12 col-sm-4"><input type='password' name='pass1' placeholder = "...{{__('password')}}" /></div>
            <div class="col-12 col-sm-4"><input type='password' name='pass2' placeholder = "...{{__('repeat pass')}}" /></div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-12"><button class="log_sub_btn">{{ucfirst(__('reset password'))}}</button></div>
        </div>
        <div class="have_account">
            <span class="regForm">{{ucfirst(__('register'))}}</span> | <span class='loginForm'>{{ucfirst(__('login'))}}</span>
        </div> 
    </div>
</form>
   