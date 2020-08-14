@extends('layouts.app')

@section('content')
    <div id="extreme_tours">
        <div class="container">
            <!-- google ad here -->
            @include('layouts.g-ad')
            @include('description')
        </div>
        <div class="container-fluid">
            <div class="row">
                @if(count($extremes))
                    @foreach($extremes->take(2) as $tour)
                        <div class="col-sm-6 col-md-6 ex_item">
                            <div class="ex_img_block">
                                <img src="{{asset($tour->images)}}" class="img-fluid" alt='ex_img' />
                            </div>
                            <div class="ex_overlay d-none wow zoomIn">
                                <p>{!! $tour->desc !!}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- second row -->
                @if(count($extremes))
                    @foreach($extremes->skip(2)->take(4) as $tour)
                <div class="col-sm-6 col-md-3 ex_item">
                    <div class="ex_img_block">
                        <img src="{{asset($tour->images)}}" class="img-fluid" alt='ex_img' />
                    </div>
                    <div class="ex_overlay d-none wow zoomIn">
                        <p>{!! $tour->desc !!}</p>
                    </div>
                </div>
                    @endforeach
                @endif
                <!-- third row -->
                @if(count($extremes))
                    @foreach($extremes->skip(6)->take(2) as $tour)
                        <div class="col-sm-6 col-md-6  ex_item">
                            <div class="ex_img_block">
                                <img src="{{asset($tour->images)}}" class="img-fluid" alt='ex_img' />
                            </div>
                            <div class="ex_overlay d-none wow zoomIn">
                                <p>{!! $tour->desc !!}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection