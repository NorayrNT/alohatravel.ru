@extends('layouts.app')

@section('content')
    <div id="cars_rental">
        <div class="container">
            <!-- google ad here -->
            @include('layouts.g-ad')
            @include('description')
            
            <div id="trans_prices">           
                @include('layouts.transport.passenger')
            </div>
        </div>    
    </div>
@endsection