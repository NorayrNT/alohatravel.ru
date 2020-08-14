<div id="out_filter">
    <div class='cnt_list owl-carousel owl-theme'>
        @if(count($countries))
            @foreach($countries as $country)
            {{--dd($country)--}}
                <div data-hash='{{$country->getId()}}'><a href="/tours/outgoings/{{$country->getId()}}">{{$country->name}}</a></div>            
            @endforeach
        @endif
    </div>
</div>