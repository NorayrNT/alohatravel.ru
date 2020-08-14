@extends('layouts.app')

@section('content')
    <div id="contact_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-5 contact_left">
                    <div class="contact_cnts">
                        <ul>
                            @if(count($contacts))
                                @foreach($contacts as $contact)
                                    @if($loop->first)
                                        <li class="active_cnt">{{$contact->cnt}}</li>
                                    @else
                                        <li>{{$contact->cnt}}</li>
                                    @endif                                
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="contact_us_block">
                        @include('errors.validation')
                        @include('errors.session')
                        <h5>{{__('contact us')}}</h5>
                        <p>{{__('happy customer')}}</p>
                        <div class="contact_us_form">
                            <form action="/contact-us" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12  col-lg-6">
                                        @if(!Auth::check())
                                            <input  type='email' name="email" placeholder="{{__('email')}}" required />  
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12  col-lg-6">
                                        <textarea  name="desc" rows=5 required placeholder="{{__('input msg')}} *"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-12  col-lg-6">
                                        <button class="contact_send_btn">{{__('send')}}</button>                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="contact_separator"></div>
                        <div class="phone_email">
                            <h4><a href="mailto:aloohatravel@gmail.com">aloohatravel@gmail.com</a></h4>
                            @if(count($contacts))
                                <p><a href="tel:{!! $contacts[0]->getPhone()[0] !!}">{!! $contacts[0]->getPhone()[0] !!}</a></p>                            
                            @endif
                        </div>
                        <div class="contact_follow_us">
                            <div class='contact_icons'>
                                @if(count($socials))
                                    @foreach($socials as $icon)
                                        <a href="{{$icon->address}}" target='_blank'>{!! $icon->icon !!}</a>        
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-7 contact_right">
                    @if(count($contacts))
                        {!! $contacts[0]->map !!}
                    @else
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.9464944591646!2d44.51538781522518!3d40.18800417744252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abce22240d73d%3A0x57a3e1d2d9814678!2sMoskovyan%20pokhoc%2C%20Yerevan%2C%20Armenia!5e0!3m2!1sen!2s!4v1597395425983!5m2!1sen!2s" 
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection