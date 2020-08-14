@extends('layouts.app')

@section('content')
    <div id="armenia">
        <div class="rep_video">
            <video src="{{asset('uploads/videos/paradise_in_dubai.mp4')}}" loop='true' type='video/mp4' autoplay='true' muted='true'></video> 
        </div>
        <div class="arm_block">
            <div class="container">
                @include('description')
                <div class="arm_list">
                    <ul>
                        @if(count($hayastan))
                            @foreach($hayastan as $hay)
                                <li>
                                    <span>{{$hay->name}}</span>
                                    <i class="zmdi zmdi-chevron-down"></i>
                                    <p>{!! $hay->desc !!} </p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection