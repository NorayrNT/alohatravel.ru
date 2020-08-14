@extends('layouts.app')

@section('content')
<div id='out_block'>
    <div class='container'>
        @include('layouts.g-ad')
        @include('description')
    </div>
    
    <!-- filteration block -->
    <div class="container">
        @include('tours.country-slide')
    </div>
    <!-- tours type block-->
    <div class='container wow fadeInUp out_tours_row'>
        <div  class='row'>
            @if($out_tours)
                @foreach($out_tours as $tour)
                    <!-- out item start -->
                    <div class='col-12 col-sm-6 col-md-4 out_item'>
                        <div class='out_img_block'>
                            <a href="/tours/outgoing/{{$tour->out_id}}">
                                <img src="{{asset($tour->images[0])}}" class='img_fluid' alt="tour_img" />
                            </a>
                        </div>
                        <div class='out_price'>
                            <span class='tour_price'>{{$tour->convert($tour->price)}}<span>{!!session('symbol')!!}</span></span>
                        </div>
                        <div class='tour_info'>
                            <div class='out_name'>
                                <a href="/tours/outgoing/{{$tour->out_id}}"><h5>{{$tour->name}}</h5></a>
                            </div>
                            <div class='tour_country out_country'>
                                <a href="/tours/outgoings/{{$tour->getId()}}"><i class="fas fa-filter"></i>{{ $tour->getParentName($tour->out_id) }}</a>
                                <span>{{$tour->duration}}</span>
                            </div>
                            <div class='tour_stars'>
                                @if($tour->stars > 0)
                                    @for($i = 0; $i < $tour->stars; $i++)
                                        <img src="{{asset('uploads/images/default/star-go.png')}}" />                                    
                                    @endfor
                                @endif
                                <span><img src="{{asset('uploads/images/default/kolobok_small.png')}}" /><span>
                            </div>
                        </div> 
                    </div>
                    <!-- out item end -->
                    @endforeach
                    @else 
                    <div class="w-100"><h6 class="text-center">no any tours</h6></div>
                    @endif
                </div>
            <div class="paginations  mb-4 ">
                {{ $out_tours->links() }}
            </div>
    </div>
     <!--instagram feed  -->
</div>
@endsection