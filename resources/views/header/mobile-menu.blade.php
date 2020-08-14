<div id="m_menu" class="wow slideInLeft" data-wow-duration='.8s'>
    <i class="zmdi zmdi-close 4x"></i>
    <div class="kolobok">
        <a href="/"><img src="{{asset('uploads/images/default/5png1.png')}}"  alt='always_togather'/></a>
    </div>
    <div class="left_icons">
        {{--@if(Auth::check())
            <a href="/user/account"><img src="{{asset('uploads/images/default/user_avatar.jpg')}}" alt="user_img" /></a>        
        @else
            <a href="/login"><i class="fa fa-users"></i></a>
        @endif --}}
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
            <i class="fa fa-phone m_phone"></i>                        
        @else
            <i class="fa fa-phone m_phone"></i>
        @endif
    </div>
    <div class="left_menu_wrapper">
        <ul>
            <li><a href="/armenia">{{__('about armenia')}}</a></li>
            <li class="with_ul">
                <span>{{__('tours in armenia')}}</span>                                
                <i class="fas fa-chevron-down"></i>
                <ul class="m_nested_menu">
                    <li>
                        <a href="/tours/incoming">{{__('incoming tours')}}</a>
                    </li>
                    <li>
                        <a href="/tours/extreme">{{__('extreme tours')}}</a>
                    </li>
                    <li>
                        <a href="/tours/individual">{{__('individual tours')}}</a>
                    </li>
                </ul>
            </li>           
            <li class="with_ul">
                <span>{{__('services')}}</span>
                <i class="fas fa-chevron-down"></i>
                <ul class="m_nested_menu">
                    <li>
                        <a href="/services/rentals/cars">{{__('car rental')}}</a>
                    </li>
                    <li>
                        <a href="/services/rentals/apartments">{{__('apartment rental')}}</a>
                    </li>
                    <li>
                        <a href="/services/transportation">{{__('transportation')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/about">{{__('about')}}</a>
            </li>
            <li>
                <a href="/contacts">{{__('contacts')}}</a>
            </li>
        </ul>
        <div class="lang_cur">
            <select class="m_language" data-type='lang'>
                @if(!is_null($locales))
                    @foreach($locales as $locale)
                        @if($locale->checkLang())
                            <option class="active_lang">{{mb_strtoupper($locale->name)}}</option>
                            @break
                        @elseif($loop->last)
                            <option class="active_lang" value='1'>ENGLISH</option>                            
                        @endif                        
                    @endforeach
                    @foreach($locales as $locale)
                        @if(!$locale->checkLang())
                            <option value='{{$locale->id}}'>{{mb_strtoupper($locale->name)}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            <select class="m_currency" data-type='currency'>
                @if(!is_null($currencies))
                    @foreach($currencies as $currency)
                        @if($currency->checkCurrency())
                            <option class="active_lang">
                                <span>{!! $currency->symbol !!}</span>
                                <span>{{ strtoupper($currency->title) }}</span>
                            </option>
                            @break
                        @elseif($loop->last)
                            <option class="active_lang">
                                <span>{{session('symbol')}}</span><span>{{session('title')}}</span>
                            </option>
                        @endif
                    @endforeach
                    @foreach($currencies as $currency)
                        @if(!$currency->checkCurrency())
                            <option value="{{$currency->id}}">
                                <span>{!! $currency->symbol !!}</span>
                                <span>{{ strtoupper($currency->title) }}</span>
                            </option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
        <div class="m_separator"></div>
        <div class="m_share_icons">
            <h6>{{ __('find us') }}</h6>
            @if(count($socials))
                @foreach($socials as $icon)
                    <a href="{{$icon->address}}" target='_blank'>{!! $icon->icon !!}</a>        
                @endforeach
            @endif           
        </div>
    </div>
</div>