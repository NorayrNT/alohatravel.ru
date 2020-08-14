@if(!is_null($current) && !is_null($current->desc))
    <div id="intro_text">
        {!! $current->desc !!}
    </div>
@endif