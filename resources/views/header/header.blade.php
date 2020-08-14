<header>
    <!-- mobile design -->
    @include('header.mobile-header')
    @include('header.mobile-menu')
    
    <!-- web design -->
    <div id='top_nav'>
        <div class='container'>
            <div class='row'>
                <div class="top_currency_lang">
                    <div class="top_mail ">
                        @if(count($contacts))
                            <a href="mailto:{{$contacts[0]->email}}">{{$contacts[0]->email}}</a>                            
                        @else
                            <a href="mailto:aloohatravel@gmail.com">aloohatravel@gmail.com</a>
                        @endif                     
                    </div>
                    <div class="lang">
                        <ul class="langs">
                            @if(count($locales))
                                @foreach($locales as $locale)
                                    @if($locale->checkLang())
                                        <li class='cur_lang'>
                                            <img src="{{asset($locale->symbol)}}" alt='locale'/>
                                            <span>{{mb_strtoupper($locale->name)}}</span><i class='fa fa-angle-down'></i>
                                            @break
                                    @elseif($loop->last)
                                        <li class='cur_lang'>
                                            <img src="{{asset('uploads/images/lang/en.png')}}" alt='locale'/>
                                            <span>ENGLISH</span><i class='fa fa-angle-down'></i>
                                    @endif
                                @endforeach
                                    <ul class='dropdown_list drop_language animated fadeInUp' data-type='lang'>
                                        @foreach($locales as $locale)
                                            @if(!$locale->checkLang())
                                                <li data-value="{{$locale->id}}">
                                                    <img src="{{asset($locale->symbol)}}" alt='locale'/>
                                                    <span>{{mb_strtoupper($locale->name)}}</span> 
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    </li>
                            @endif
                        </ul>
                        <ul class='currencies' >
                            @if(count($currencies))
                                @foreach($currencies as $currency) 
                                    @if($currency->checkCurrency())
                                    <li class='cur_currency'>
                                        <span>{!! $currency->symbol !!}</span>
                                        <span>{{ strtoupper($currency->title) }}</span>
                                        <i class='fa fa-angle-down'></i>
                                        @break
                                    @elseif($loop->last)
                                        <li class='cur_currency'>
                                            <span>&#36</span>
                                            <span>USD</span><i class='fa fa-angle-down'></i>
                                    @endif
                                @endforeach
                            <ul class='dropdown_list drop_currency animated fadeInUp' data-type='currency'>
                                @foreach($currencies as $currency)
                                    @if(!$currency->checkCurrency())
                                        <li data-value="{{$currency->id}}">
                                            <span>{!! $currency->symbol !!}</span>
                                            <span class='cur_list'>{{strtoupper($currency->title)}}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            </li>  
                            @endif                          
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-4 first_menu'>
                    <ul class='top_links'>
                        <li><a href="/armenia">{{__('about armenia')}}</a></li>
                        <li><a href="/about">{{__('about us')}}</a></li>
                        <li class="with_nested">
                            <a href="#">{{__('services')}}<i class='fa fa-caret-down'></i></a>
                            <ul class='nested_ul service_list animated fadeInDown'>
                                <li><a href="/services/rentals/cars">{{__('car rental')}}</a></li>
                                <li><a href="/services/rentals/apartments">{{__('apartment rental')}}</a></li>
                                <li><a href="/services/transportation">{{__('transportation')}}</a></li>
                                <li><a href="/contacts">{{__('hotels')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class='numbers'>
                        @if(count($contacts))
                            <a href='tel:{!! $contacts[0]->getPhone()[0] !!}'>{!! $contacts[0]->getPhone()[0] !!}</a>                        
                        @else
                            <a href='tel:+37494333333'>+37494333333</a>
                        @endif
                        <span class="all_phones"><i class="zmdi zmdi-chevron-right"></i></span>
                    </div>
                </div> 
                <div class='col-4 logo_part'>
                    <div class='logo'>
                        <a href='/'><img src="{{ asset('uploads/images/default/5png1.png') }}" alt='company logo' /></a>
                    </div> 
                </div> 
                <div class='col-4 second_menu'> 
                    <ul class='top_links '>
                        <li class="with_nested">
                            <a href="#">{{__('tours in armenia')}}<i class='fa fa-caret-down'></i></a>
                            <ul class='nested_ul tour_list animated  fadeInDown' >
                                <li><a href="/tours/incoming">{{__('incoming tours')}}</a></li>
                                <li><a href="/tours/extreme">{{__('extreme tours')}}</a></li>
                                <li><a href="/tours/individual">{{__('individual tours')}}</a></li>
                            </ul>
                        </li>
                        <li class='chatify wow bounceIn' data-wow-iteration="infinite" data-wow-duration="3s"><a href="/chatify">{{__('chat')}}</a></li>                        
                        <li><a href="/contacts">{{__('contacts')}}</a></li>
                    </ul>
                    <div class='top_search'>
                        <div class='social_icons'>
                            @if(Auth::check())
                                <a href="/user/account" class="userAcc">
                                    @if(Auth::user()->image)
                                        <img src="{{asset(Auth::user()->image)}}" alt='user_img' class="logged_user" /> 
                                    @else
                                        <img src="{{asset('uploads/images/default/user_avatar.jpg')}}" alt='user_img' class="logged_user" />
                                    @endif
                                </a>
                            @else
                                <a href="/login"><i class='fa fa-users fa-lg wow zoomIn' aria-label='true'></i></a>                                
                            @endif 
                            @if(count($socials))
                                @foreach($socials as $icon)
                                    <a href="{{$icon->address}}" target='_blank'>{!! $icon->icon !!}</a>        
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>   
</header>