<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
@include('layouts.homeTopbar')
    <div class="main">
        <div class="anime">
            <!--anime stuff goes here-->
            text
        </div>
        <div class="manga">
            <!--manga stuff goes here-->
            text
        </div>
        <div class="latest">
            <!--latest stuff goes here-->
            text
        </div>
        @can('anime-list')
        <div class="list">
            <!--own list stuff goes here-->
            text2
        </div>
        @endcan
    </div>
</body>
<!--
    - possible anime/manga reccomendations?
    - latest anime/manga added?
    - your list preview?
-->
