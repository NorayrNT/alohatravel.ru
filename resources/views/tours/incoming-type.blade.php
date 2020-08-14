@extends('layouts.app')

@section('content')
    <div id="incoming_tour_types">
        <div class="container">
            @include('layouts.g-ad')
            <div id="intro_text">
                @if(!is_null($tour))
                    {!! $tour->seo_desc !!}
                @endif
            </div>

            <div class="row" id='no_margin'>
                @if(count($tour->inTours))
                    @foreach($tour->inTours as $item)
                        <div class="col-12 col-sm-6 col-md-4 type_item">
                            <div class="type_img_block">
                                <a href="/tours/incoming-tour/{{$item->getMainId()}}">
                                    <img src="{{asset($item->images)}}"  alt="img_block" class="img_fluid"/>
                                </a>
                            </div>
                            <div class="tour_type_info ">
                                <div class="tour_type_name">
                                    <a href="/tours/incoming-tour/{{$item->getMainId()}}">
                                        <h5>{{$item->name}}</h5>   
                                    </a>
                                </div>
                                <div class='tour_duration'>
                                    <p>{{$item->duration}}</p>
                                </div>
                                <div class="c_hr"></div>
                                <div class="type_price">
                                    <span class='price_span'>{{__('start price')}} </span> <span class="starting_price">{{$item->price}} {!!session('symbol')!!}</span>
                                </div> 
                                <a href="/tours/incoming-tour/{{$item->getMainId()}}" class="more_btn">{{__('view more')}}</a>
                            </div>                    
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection