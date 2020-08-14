@extends('layouts.app')

@section('content')
    <div id="out_ind_block">
        <div class='container'>
            <div class="g_incoming_ad">
                <div class='g_ad'>
                    <!-- add google ad unit here -->
                </div>
            </div>
            @if(!is_null($tour))
             <div class="main_price_block">
                <div class="main_name"><h5>{{$tour->name}}</h5></div>
                <div class="main_duration"><p>{{ $tour->duration }}</p></div>
                <div class="m_price">
                    <span class='price_span'>{{__('start price')}} </span> <span class="starting_price">{{$tour->price}} {!!session('symbol')!!}</span>
                </div>
            </div>
        </div>

        <div class="out_ind_info">
            <div class="container out_ind">
                <div class="out_overview">
                    <p>{!! $tour->desc !!} </p>
                </div>
                <div class="out_overview_images owl-carousel owl-theme">
                    @if($tour->images)
                        @foreach($tour->images as $image)
                            <div><img src="{{asset($image)}}" alt="day_img" /></div>
                        @endforeach
                    @endif
                </div>
                <div class="tour_map_block">
                    {!! $tour->map !!}
                </div>
                <div class="include_separator"></div>
                <div class="row includes">
                    <div class="col-sm-4 include">
                        {!! $tour->include !!}
                    </div>
                    <div class="col-sm-4 include">
                        {!! $tour->exclude !!}
                    </div>
                    <div class="col-sm-4 include">
                        {!! $tour->notes !!}
                    </div>
                </div>
                @endif
                @include('shares.icons')
            </div>
        </div>

    </div>
@endsection