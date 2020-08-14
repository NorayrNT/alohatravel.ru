@extends('layouts.app')

@section('content')
    <div id="apartment_rental">
        <div class="container">
            @include('layouts.g-ad')
            @include('description')
            
            <!-- filteration -->
            <div class="row apartment_filters">
                <div class="col-12 col-sm-12 col-md-4">
                <form action="/services/rentals/apartments" method="get" enctype="multipart/form-data" id="apartment_form">
                    <div class="price_symbol">
                        <span class="range_first_price"></span> - 
                        <span class="range_second_price" data-symbol="{{session('title')}}"></span>                        
                    </div>
                    <div id="filter"></div>
                    <input type="text" name='price1' class="range_first_price"  hidden />
                    <input type='text' name='price2' class="range_second_price" hidden />
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                        <button type='submit' class='apartment_submit_btn' hidden></button>
                        <ul class="ap_filters">
                            <li>
                                <select name='floors'>
                                    <option value=''>{{__('floor')}}</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                </select>
                            </li>
                            <li>
                                <select name='bedrooms'>
                                    <option value=''>{{__('bedrooms')}}</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                </select>
                            </li>
                            <li>
                                <select name='rooms'>
                                    <option value=''>{{__('rooms')}}</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                </select>
                            </li>
                            <li>
                                <input type='checkbox' value='1' name='satellite'  />
                                <label for="satellite">{{__('satellite')}}</label> 
                            </li>
                            <li>
                                <input type='checkbox' value='2' name='ac'  />
                                <label for="air_conditioning">{{__('air-conditioner')}}</label> 
                            </li>
                            <li>
                                <input type='checkbox' value='3' name='wifi'  />
                                <label for="wifi">{{__('wifi')}}</label> 
                            </li>
                            <li>
                                <input type='checkbox' value='4' name='wash'  />
                                <label for="washing-machine">{{__('washing-machine')}}</label> 
                            </li>
                            <li>
                                <input type='checkbox' value='5' name='elevator'  />
                                <label for="elevator">{{__('elevator')}}</label> 
                            </li>
                        </ul>
                    </form>
                    <i class="fa fa-search ap_src"></i>
                </div>
            </div>
        </div>
        <!-- apartments -->
        <div class="container">
            <div class='row ap_block'>
                @if(count($apartments))
                    @foreach($apartments as $item)
                    <div class="col-12 col-sm-6 col-md-4">
                            <div class="ap_img_block" data-id={{ $item->id }}>
                                @if(!empty($item->images))
                                    <img src="{{asset($item->images[0])}}" class='img-fluid' alt='ap_img' />
                                @else 
                                    <img src="{{asset('uploads/images/default/default_house.jpg')}}" class='img-fluid' alt='ap_img' />
                                @endif
                            </div>
                            <div class="name_price">
                                <h6>{{$item->address}}</h6>
                                <span data-symbol="{!! session('symbol') !!}" class="ap_price">{{$item->price}}</span>
                            </div>
                            <div class="ap_icons">
                                {{$item->renderIcon($item)}}
                            </div>
                            <div class="ap_separator"></div>
                            <div class="floors">
                                <span>{{__('floor')}}: {{$item->floors}}</span><span>{{__('bed')}}: {{$item->bedrooms}}</span>
                            </div>
                            <div class="ap_btn">
                                <button class='ap_book_btn'>{{__('book now')}}</button>
                            </div>
                        </div>
                        @endforeach                
                    @endif
                </div>
                <div class='paginations mb-4'>
                    {{$apartments->links()}}
                </div>
        </div>
    </div>
    @include('modals.apartment')
@endsection