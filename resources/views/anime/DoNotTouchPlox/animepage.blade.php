@extends('anime.layout.master')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>OurAnimeList</title>
</head>
<body>


@section('logo')
    @parent
@endsection

@section('navbar')
    @parent
@endsection



<table id="info" border="1">
    <tr>
        <th>Title</th>
        <th>Total episodes</th>
        <th>Aired</th>
    </tr>
    @foreach($result as $anime)
        <tr>
            <td><p>{{$anime->title}}</p></td>
            <td><p>{{$anime->episodes}}</p></td>
            <td><p>{{$anime->aired}}</p></td>
        </tr>
    @endforeach
</table>

<table id="description" border="1">
    <tr>
        <th>Description</th>
    </tr>
    @foreach($result as $anime)
        <tr>
            <td><p>{{$anime->description}}</p></td>
        </tr>
        @endforeach
</table>


<table id="sidepanel" border="1">
    <tr>
        <th>
            <p>Suggested</p>
        </th>
    </tr>
    <tr>
            <td><img src="{{asset('../public/images/UBW.jpg')}}"></td>
    </tr>
</table>

<img id="Bleach" src="{{asset($anime->imgPath)}}" alt="Bleach" style="width:250px;height:375px">



</body>
</html>


<style>
    #Bleach{
        position: relative;
        bottom: 350px;
    }

    #description{
        position: relative;
        top: 200px;
        left: 285px;
        width: 50%;
    }

    #sidepanel{
        position: absolute;
        left: 1100px;
        width: 400px;
        bottom: 25px;
        border-collapse: collapse;
        border: solid;
    }

    #sidepanel td{
        height: 500px;
    }

    #description td{
        position: relative;
        height: 400px;
        text-align: center;
        vertical-align: top;
        text-decoration-color: black;
        list-style-type: none;
    }

    #info {
        margin: 0px auto;
        position: relative;
        top: 166px;
        right: 207px;
        border-collapse: collapse;
        width: 400px;

    }

    #info th {
        height: 25px;
        text-align: left;
    }


</style>

