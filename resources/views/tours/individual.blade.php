@extends('layouts.app')

@section('content')
<div id="incoming_tour">
    <div class="container">        
        <!-- google ad here -->
        @include('layouts.g-ad')
        @include('description')

        <!-- private tours table -->
        <div id="ind_table">
            <table class="table">
                <tbody>
                    <tr class='text-center first_header'>
                        <th ></th>
                        <th colspan='3'>{{__('without guide')}}</th>
                        <th class='no_border'></th>
                        <th colspan='3'>{{__('with guide')}}</th>
                        <th class='no_border'></th>
                        <th colspan='2'></th>
                    </tr>
                    <tr class="second_header">
                        <th>{{__('destination')}}</th>
                        <th>1-3 {{__('pax')}}</th>
                        <th>4-7 {{__('pax')}}</th>
                        <th>8-18 {{__('pax')}}</th>
                        <th class='no_border'></th>
                        <th>1-3 {{__('pax')}}</th>
                        <th>4-7 {{__('pax')}}</th>
                        <th>8-18 {{__('pax')}}</th>
                        <th class='no_border'></th>
                        <th>{{__('km')}}</th>
                        <th>{{__('hr')}}</th>
                    </tr>
                    @if(count($individuals))
                        @foreach($individuals as $tour)
                            <tr class="tbl_items" data-id={{$tour->getId()}}>
                                <td>{{$tour->name}}</td>
                                <td>{{$tour->wt3}}</td>
                                <td>{{$tour->wt7}}</td>
                                <td>{{$tour->wt18}}</td>
                                <td class='no_border'></td>
                                <td>{{$tour->w3}}</td>
                                <td>{{$tour->w7}}</td>
                                <td>{{$tour->w18}}</td>
                                <td class='no_border'></td>
                                <td>{{$tour->km}}</td>
                                <td>{{$tour->duration}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>  
@include('modals.individual')      
@endsection