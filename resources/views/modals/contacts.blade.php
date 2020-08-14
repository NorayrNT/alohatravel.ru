<div id="contacts_modal">
    <div class="container">
        <div class="all_contacts">
            @if(!is_null($contacts))
                @foreach($contacts as $number)
                <h6 class="cnt_name">{{$number->cnt}}</h6>
                    @if(!is_null($number->getPhone()))
                        <ul>
                            @foreach($number->getPhone() as $numb)
                                <li>{{$numb}}</li>
                            @endforeach
                        </ul>
                    @endif                
                @endforeach
            @endif
        </div>
    </div>
    <i class="fas fa-times"></i>
</div>