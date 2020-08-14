<form action="/user/register" method="post" enctype="multipart/form-data" id='regForm' class="d-none wow slideInRight" data-wow-duration='.5s'>
    @csrf
    <div id='inner_form'>
        <div class="form-group row">
            <div class="col-12 col-sm-6"><input type='text' name='name' placeholder="... {{__('name')}}" required/></div>
            <div class="col-12 col-sm-6"><input type='email' name='email' required placeholder="... {{__('email')}}" required /></div>
        </div>
        <div class="form-group row ">
            <div class="col-12 col-sm-6"><input type='password' name='password' placeholder="... {{__('password')}}" required/>
                <p class='under_pass animated zoomIn'>({{__('pass form')}})</p>
            </div>            
            <div class="col-12 col-sm-6"><input type='password' name='password_confirmation' placeholder="... {{__('repeat pass')}}" required/></div>
        </div>
        <div class="form-group row ">
            <div class="col-12">
                <label for="gender">
                    <select name='gender' id="reg_select">
                        <option value='male' selected>{{__('male')}}</option>
                        <option value='female'>{{__('female')}}</option>
                    </select><br>
                </label>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-12">
                <label for='image' id='img_up'>
                    <input type='file' name='user_image' class='user_img_upload' />
                    <i class="fas fa-plus"></i>
                </label>
            </div>  
        </div>  
        <div class="form-group row mb-0">
            <div class="col-12"><button class="log_sub_btn" id="reg_create">{{__('register')}}</button></div>
        </div>
        <div class="have_account">
            <span>{{ucfirst(__('have account'))}} ?</span> | <span class='loginForm'>{{ucfirst(__('login'))}}</span>
        </div>
    </div>
</form>