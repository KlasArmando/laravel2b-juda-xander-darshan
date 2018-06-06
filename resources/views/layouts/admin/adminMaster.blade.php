<head>
    <style type="text/css" >
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f1f1f1;
            padding: 10px;
        }

        .column {
            float: left;
            padding: 10px;
            background: white;
            border-radius: 5px;
        }

        .column.side {
            width: 25%;
        }

        .column.middle {
            width: 74%;
            margin-left: 1%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .error {
            margin: 5px;
            padding: 3px 10px;
            border-radius: 5px;
            background: lightcoral;
            color: white;
        }

        @media screen and (max-width: 600px) {
            .column.side, .column.middle {
                width: 100%;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .go-right {
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a.active {
            background-color: #4CAF50;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        .role {
            border: 1px solid black;
            background: lightgreen;
            border-radius: 5px;
            padding: 3px;
            margin-right: 2px;
        }

    </style>
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

            @yield('content')
        </div>
    </div>
</body>
