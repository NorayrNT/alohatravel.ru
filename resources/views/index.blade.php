@extends('layouts.app')

@section('content')
@include('modals.contacts')
    <div id='main_body'>
        <div class='container toggle_width'>
            <div class='row'>
                @if(count($tourTypes))
                    @foreach($tourTypes as $type)
                        <div class='col-12 col-sm-12 col-md-3 wow fadeInUp tour_block'>
                            <a href="{{$type->url}}">
                                <div class='tour_img'>
                                    <img src="{{ asset($type->images) }}" class='img-fluid' alt='tour_img' />
                                </div>
                                <div class='tour_overlay wow zoomIn'>
                                    <div class="over_text">
                                        <p>{{ ucfirst($type->desc) }}</p>
                                    </div>
                                </div>
                                <div class='tour_text wow fadeInUp'>
                                    <p>{{ $type->title }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Why We -->
    <div id='why_we'>
        <div class='container-fluid '> 
            <div class='row'>
                <div class='col-sm-12 col-md-6 wow fadeInLeft why_we'>
                    <h5>{{__('index about')}}</h5>
                   <p > {{ __('about-text') }} </p>
                </div>
                <div class='col-sm-12 col-md-6 wow fadeInRight why_we'>
                    <h5 class='text-center'>{{__('why we')}}</h5>
                    @if(count($whywes))
                        @foreach($whywes as $item)
                            <div class="ind_block">
                                {!! $item->renderDiv($loop->iteration) !!}
                                <div class='we_text'>
                                    {!! $item->desc !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>        
    </div>
    <!-- ad block -->
    <div class='g_ad'> </div>
    <!-- Best Tours -->
    <div id="best_tours">
        <div class='best_tour_header text-center'>
            <h3>{{__('featured tours')}}</h3>
            <p>{{__('best packages')}}</p>
        </div>
        <div class='container toggle_width'>
            <div class='row wow fadeInUp' data-wow-duration='.8s'>
                 <!--tour start  -->
                 @if(count($inTours))
                    @foreach($inTours as $tour)
                        <div class='col-12 col-sm-6 col-md-3 best_tour'>
                            <a href="/tours/incoming-tour/{{$tour->getId()}}">
                                <div class='img_block'>
                                    <img src="{{asset($tour->images)}}" class='img-fluid' alt='tour_img' />
                                </div>
                            </a>    
                            <div class='tour_info'>
                                <div class='price_block'>
                                    <span class='tour_price'>{{$tour->price}}<span>{!! session('symbol') !!}</span></span>
                                </div>
                                <a href="/tours/incoming-tour/{{$tour->getId()}}">
                                    <div class='tour_name'>
                                        <h5>{{$tour->name}}</h5>
                                    </div>
                                </a>
                                <div class='tour_country'>
                                    <a href="/tours/incoming"><i class="fas fa-filter"></i>{{__('armenia')}}</a>
                                    <span>{{$tour->duration}}</span>
                                </div>
                                <div class='tour_stars'>
                                    @if(!is_null($tour->stars))
                                        @for($i = 0; $i < $tour->stars; $i++)
                                            <img src="{{asset('uploads/images/default/star-go.png')}}" />                                        
                                        @endfor
                                    @endif
                                    <span><img src="{{asset('uploads/images/default/kolobok_small.png')}}" /><span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                 @endif
                <!-- tour end -->
            </div>
        </div>
    </div>
    <!-- Services -->
    <div id="services_block" class='wow fadeInUp'>
        <div class='service_header text-center'>
            <h3>{{__('services')}}</h3>
            <p>{{__('company services')}}</p>        
        </div>
        <div class='container toggle_width'>
            <div class="row justify-content-center">
                @if(count($services))
                    @foreach($services as $service)
                        @if($service->url !== null)
                            <div class='col-12 col-sm-6 col-md-3 service_item'>
                                <a href="{{$service->url}}">
                                    <div class='ser_img'>
                                        <img src="{{asset($service->images)}}" class='img-fluid' alt='service_img' />
                                    </div>
                                    <div class='ser_desc'>
                                        <p>{!! $service->name !!}</p>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class='col-12 col-sm-6 col-md-3 service_item'>
                                <div class='ser_img'>
                                    <img src="{{asset($service->images)}}" class='img-fluid' alt='service_img' />
                                </div>
                                <div class='ser_desc'>
                                    <p>{!! $service->name !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach 
                @endif   
            </div>
        </div>
    </div>    
@endsection