<div id="top_mobile">
    <div class="container-fluid">
        <div class="m_header_wrapper">
            <div class="menu_icon">
                <div class="m1"></div>
                <div class="m2"></div>
                <div class="m3"></div>
            </div>
            <div class="m_img">
                <a href="/"><img src="{{asset('uploads/images/default/5png1.png')}}" alt='logo_img' /></a>
            </div>
            <div class="m_icons">               
                @if(Auth::check())
                    <a href="/user/account" class="userAcc">
                    @if(Auth::user()->image)
                        <img src="{{asset(Auth::user()->image)}}" alt='user_img' class="logged_user" /> 
                    @else
                        <img src="{{asset('uploads/images/default/user_avatar.jpg')}}" alt='user_img' class="logged_user" />
                    </a>
                    @endif
                @else
                    <a href="/login"><i class='fa fa-users fa-lg wow zoomIn' aria-label='true'></i></a>                                
                @endif
                <a href="/chatify"><i class="far fa-comments"></i></a>
                @if(!is_null($contacts))
                    <i class="fa fa-phone m_phone" ></i>
                @else
                    <i class="fa fa-phone m_phone"></i>
                @endif                
            </div>
        </div>
    </div>
</div>