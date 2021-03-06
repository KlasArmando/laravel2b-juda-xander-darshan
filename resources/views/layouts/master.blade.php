<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('extra-css')
</head>
<body>
<div class="row">
    @include('layouts.homeTopbar')
    <div class="main">
        @yield('content')
    </div>
    <div class="footer">
        <div class="footer-child">
            <a href="https://github.com/KlasArmando/laravel2b-juda-xander-darshan.git">Github</a>
        </div>
    </div>
</div>
</body>