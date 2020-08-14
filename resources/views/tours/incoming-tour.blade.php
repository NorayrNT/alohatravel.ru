@extends('layouts.app')

@section('content')
    <div id="incoming_tour">
        <div class="container">
            <div class="g_incoming_ad">
                <div class='g_ad'>
                    <!-- add google ad unit here -->
                </div>
            </div>
            @if(!is_null($tour))
                <div class="main_price_block">
                    <div class="main_name">
                        <h5>{{ $tour->name }}</h5>
                    </div>
                    <div class="main_duration">
                        <p>{{ $tour->duration }}</p>
                    </div>
                    <div class="m_price">
                        <span class='price_span'>{{__('start price')}} </span> <span class="starting_price">{{ $tour->price }} {!!session('symbol')!!}</span>
                    </div>                    
                    <div class="overview">
                        <h5>{!! $tour->desc !!}</h5>
                    </div>
                </div>
            @endif
            @if($tour && count($tour->days))
                @foreach($tour->days as $day)
                    <div id="tour_description">
                        <div class="day">
                            <div class='day_line' data-day={{$loop->iteration}}></div>
                            <div class="day_heading">
                                <h5>{{ $day->places }}</h5>
                            </div>
                            <div class="day_description">
                                <p>{!! $day->desc !!}
                                </p>
                            </div>
                            <div class="day_images owl-carousel owl-theme">
                                @if(!empty($day->images))
                                    @foreach($day->images as $image) 
                                        <div><img src="{{asset($image)}}" alt='day_img' /></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="tour_map_block">
                {!! $tour->map !!}
            </div>
            <div class="price_depends">
                    <div class='depend_text_block'>
                        <h5>{{__('price dependancy')}}</h5>
                    </div>
                    <div class="price_table">
                        <table class='table'>
                        <tbody>
                            <tr class='price_tbl_head'>
                                <th>6 {{__('pax')}}</th>
                                <th>8 {{__('pax')}}</th>
                                <th>10 {{__('pax')}}</th>
                                <th>12 {{__('pax')}}</th>
                                <th>16 {{__('pax')}}</th>
                            </tr>
                            <tr class='price_tbl_row'>
                                <td><span >{{$tour->p6}} {!! session('symbol') !!}</span></td>
                                <td><span >{{$tour->p8}} {!! session('symbol') !!}</span></td>
                                <td><span >{{$tour->p10}} {!! session('symbol') !!}</span></td>
                                <td><span >{{$tour->p12}} {!! session('symbol') !!}</span></td>
                                <td><span >{{$tour->p16}} {!! session('symbol') !!}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='include_separator'></div>
            <div class="row includes">
                <div class="col-sm-4 include">
                    <div class="ul_header">{{__('includes')}}</div>
                    {!! $tour->include !!}
                </div>
                <div class="col-sm-4 include">
                    <div class="ul_header">{{__('excludes')}}</div>
                    {!! $tour->exclude !!}
                </div>
                <div class="col-sm-4 include">
                    <div class="ul_header">{{__('notes')}}</div>
                    {!! $tour->notes !!}
                </div>
            </div>
            @include('shares.icons')
        </div>
    </div>
@endsection