<div class="man_trans">
    <h5>passenger</h5>
</div>
<div class="autoScroll">
    <table class="table man_tbl">
        <thead>
            <tr>
                <th>{{__('destination')}}</th>
                <th>{{__('price')}}({!! strtoupper(session('title')) !!})</th>
                <th>{{__('luggage')}}({{__('kg')}})</th>
                <th>{{__('duration')}} ({{__('hr')}})</th>
                <th>{{__('distance')}}({{__('km')}})</th>
                <th>{{__('date')}}</th>            
                <th></th>
            </tr>                    
        </thead>
        <tbody>
            @if(count($shippings))
                @foreach($shippings  as $shipping)
                    <tr>
                        <td>{{$shipping->name}}</td>
                        <td class='tr_price'><span>{{$shipping->price}}</span></td>
                        <td class="tr_luggage"><span>{{$shipping->luggage}}</span></td>
                        <td>{{$shipping->duration}}</td>
                        <td>{{$shipping->distance}}</td>
                        <td>{{$shipping->date}}</td>
                        <td><button class="trans_book_btn">{{__('book now')}}</button></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>