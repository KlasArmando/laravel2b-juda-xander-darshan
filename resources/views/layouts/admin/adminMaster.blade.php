<head>
    <script src="{{asset('js/confirm.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
</head>
<body>
    <div class="row">
        <div class="column side">
            @include('layouts.admin.adminNavbar')
        </div>
        <div class="column middle">
            @if ($errors->any())
                <div class="error">
                    <h4>Error:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
