<footer>
    <div id='footer_block'>
        <div class="container">
            <div class='row'>
                <div class='col-sm-12 col-md-3 footer_item'>
                    <div class='foot_logo'>
                        <a href="/">
                        <img src="{{asset('uploads/images/default/alooha_travel.png')}}" class='img-fluid' /></a>
                    </div>
                    <div class='footer_icons'>
                        @if(count($socials))
                            @foreach($socials as $icon)
                                <a href="{{$icon->address}}" target='_blank'>{!! $icon->icon !!}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 footer_item">
                    <ul>
                        <li>{{__('tours')}}</li>
                        @if(count($footerTypes))
                            @foreach($footerTypes as $type)
                                <li><a href="{{$type->url}}">{{$type->title}}</a></li>                                
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 footer_item">
                    <ul>
                        <li>{{__('services')}}</li>
                        @if(count($footerServices))
                            @foreach($footerServices as $service)
                                @if(!is_null($service->url))
                                    <li><a href="{{$service->url}}">{{$service->name}}</a></li>
                                @endif                                
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-sm-12 col-md-3 footer_item">
                    <ul class='contact_col'>
                        <li>{{__('about us')}}</li>
                        @if(count($contacts))
                            <li><i class='fas fa-map-marked-alt'></i>{{$contacts[0]->addr}}</li>
                            <li><i class='fas fa-envelope-square'></i>
                                @if(!is_null($contacts[0]->email))
                                    <a href="mailto:{{$contacts[0]->mail}}">{{$contacts[0]->email}}</a>
                                @endif
                            </li>
                            <li><i class="fas fa-phone"></i>
                                @if(count($contact))
                                    @if(!is_null($contacts[0]->getPhone()[0]))
                                        <a href="tel:{!! $contacts[0]->getPhone()[0] !!}">{!! $contacts[0]->getPhone()[0] !!}</a>
                                    @endif
                                @endif
                            </li>
                        @endif
                        <!-- <li><i class="fas fa-shoe-prints"></i><a href="/terms">{{__('terms')}}</a></li> -->
                        <li class='subscribe'><input type="email" placeholder=" . . . {{__('subscribe')}}"/>
                            <i class="zmdi zmdi-long-arrow-right"></i>
                            <div></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class='comp_block text-center'>
                <div class='footer_separator'></div>
                <div class='all_rights'>
                    <p><i class='fas fa-copyright'></i> 
                     {{date("Y")}} {{__('all rights')}} <a href="/">alooha travel</> </a></p>                    
                </div>
                <div class='it_comp'>
                    <p>{{__('d&d')}} <a target="_blank" href="http://xstudios.ru"><span> [x] studios llc</span></a></p>
                </div>
            </div>    
        </div>
    </div>
</footer>