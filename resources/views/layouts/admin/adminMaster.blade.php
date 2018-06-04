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

        @media screen and (max-width: 600px) {
            .column.side, .column.middle {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="column side">
            @include('layouts.admin.adminNavbar')
        </div>
        <div class="column middle">
            @yield('content')
        </div>
    </div>
</body>
