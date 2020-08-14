@extends('layouts.app')

@section('content')
    <div id="incoming_block">
        <div class="container">
            @include('layouts.g-ad')
            @include('description')
            <div class="row justify-content-center" id="bordered" >
                @if(count($ins))
                    @foreach($ins as $type)
                        <div class="col-6 col-sm-6 col-md-3 bordered">
                            <a href="/tours/incoming-type/{{$type->getSlug()}}">
                                <div class="incoming_tour_img">
                                    <img src="{{asset($type->images[0])}}" alt="tour_img" />
                                </div>
                                <div class="in_second_img d-none">
                                    <img src="{{asset($type->images[1])}}"   alt="tour_img"/>
                                </div>
                                <div class="inc_tour_name" >
                                    <h5>{{$type->name}}</h5>
                                </div>
                            </a>
                        </div>                    
                    @endforeach
                @endif
            </div>
        </div>
    </div>  
@endsection