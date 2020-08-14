@extends('layouts.app')

@section('content')
<div id="cars_rental">
    <div class="container">
            @include('layouts.g-ad')
            @include('description')
        </div>
            <div class="container">
                <div class="row cars_block">
                    <!-- start -->
                    @if(count($cars))
                        @foreach($cars as $car)
                            <div class="col-12 col-sm-12 col-md-3">
                                <div class="car_img_block" data-main-id = {{$car->getid()}}>
                                    @if(!empty($car->images))
                                        <img src="{{asset($car->images[0])}}" class="img-fluid" alt="car-image" />
                                    @else
                                        <img src="{{asset('uploads/images/default/default_car.png')}}" class="img-fluid" alt="car-image" />
                                    @endif
                                </div>                
                            </div>
                            
                                
                                <div class="col-12 col-sm-12 col-md-9 mb-4">
                        <div class="car_name">
                            <h5>{{$car->name}}</h5>
                            <div class="name_separator"></div>
                        </div>
                        <div class="car_characters">
                            <p>{{$car->chars}}</p>
                        </div>
                        <div class="car_info">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-9">
                                    <ul>
                                        <li>
                                            <table class='tbl_1'>
                                                <tbody>
                                                    <tr>
                                                        <td>{{__('type')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('transmission')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->trans}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class='tbl_2'>
                                                <tbody>
                                                    <tr>
                                                        <td>{{__('doors')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->doors}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('seats')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->seats}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <table class='tbl_3'>
                                                <tbody>
                                                    <tr>
                                                        <td>{{__('luggage boot')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->boots}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('motor')}}</td>
                                                        <td>:</td>
                                                        <td>{{$car->motor}}<span>h/p</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-8 col-sm-8 col-md-3 car_book_btn">
                                    <button>{{__('book now')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <!-- prices start -->
                    <div id="days_table">
                        <table class="table days_table ">
                            <thead>
                                <tr>
                                    <th>{{__('period')}}</th>
                                    <th>1-2 {{__('days')}}</th>
                                    <th>3-4 {{__('days')}}</th>
                                    <th>5-7 {{__('days')}}</th>
                                    <th>8-12 {{__('days')}}</th>
                                    <th>13-30 {{__('days')}}</th>
                                    <th> > 30 {{__('days')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{__('day/price')}}</td>
                                    <td>{{$car->d2}} {!!session('symbol')!!}</td>
                                    <td>{{$car->d4}} {!!session('symbol')!!}</td>
                                    <td>{{$car->d7}} {!!session('symbol')!!}</td>
                                    <td>{{$car->d12}} {!!session('symbol')!!}</td>
                                    <td>{{$car->d30}} {!!session('symbol')!!}</td>
                                    <td class='more_30'>{{__('ask for price')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- prices end -->
                    </div>
            </div>
            <!-- Mobile version -->
            <div class="container mobile_car_tbl">
                <!--   <div class="row">
                    <div class="col-12 d-md-none car_mobile"> -->
                        <table class="table v_mobile">
                            <thead>
                                <tr>
                                    <th>{{__('period')}}({{__('days')}})</th>
                                    <th>{{__('price')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1-2</td>
                                    <td>{{$car->d2}} {!!session('symbol')!!}</td>
                                </tr>
                                <tr>
                                    <td>3-4</td>
                                    <td>{{$car->d4}} {!!session('symbol')!!}</td>
                                </tr>
                                <tr>
                                    <td>5-7</td>
                                    <td>{{$car->d7}} {!!session('symbol')!!}</td>                                    
                                </tr>
                                <tr>
                                    <td>8-12</td>
                                    <td>{{$car->d7}} {!!session('symbol')!!}</td>                                    
                                </tr>
                                <tr>
                                    <td>13-30</td>
                                    <td>{{$car->d30}} {!!session('symbol')!!}</td>                                    
                                </tr>
                                <tr>
                                    <td>> 30</td>
                                    <td class='more_30'> {{__('ask for price')}}</td>                                    
                                </tr>
                            </tbody>
                        </table>
                    <!-- </div>
                </div>   -->
            </div>
            @endforeach
        @endif
        </div>
    </div>
    @include('modals.cars')
@endsection