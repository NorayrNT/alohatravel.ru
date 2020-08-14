@include('layouts.head')
    
<body>
    @include('header.header')
    
    @include('shares.socials')

    @section('main')
        @yield('content')
    @show
    
    @include('modals.contacts')
    @include('layouts.footer')

    <!-- Js Files -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="module" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="module" src="{{asset('js/animate.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script  type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="https://kit.fontawesome.com/6203ebf538.js" crossorigin="anonymous"></script>
    <!-- <script type="module" src="{{asset('js/instafeed.min.js')}}"></script> -->
</body>
</html>    