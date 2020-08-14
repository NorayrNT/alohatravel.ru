<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}" />
        @include('layouts.share')
        <title> 
            {{-- @if(isset($current) && ($current !== null))
                {{ $current->seo_title }}
            @elseif(isset($tour->seo_title) && ($tour->seo_title !== null))
                {{ $tour->seo_title }}
            @else
                {{ config('app.name') }}
            @endif --}}
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|ZCOOL+XiaoWei" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sofia" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Lato&display=swap" rel="stylesheet">
       
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
        
        <!-- ZMDI -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

        <!-- JivoChat -->
        <script src="//code.jivosite.com/widget/LKxdCRzQ3X" async></script>
        
        <!-- Styles -->
        <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/jquery-ui.structure.css') }}" rel= "stylesheet">
        <link href="{{ asset('css/jquery-ui.theme.css') }}" rel= "stylesheet">  
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/mobile.css') }}" rel="stylesheet" type="text/css" />
    </head>