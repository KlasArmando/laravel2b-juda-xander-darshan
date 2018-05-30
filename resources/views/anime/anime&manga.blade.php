@extends('anime.layout.navbar')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
            <td><a href="anime/{{$anime->id}}">{{$anime->title}}</a></td>
            <td><a href="anime/{{$anime->id}}">{{$anime->episodes_Total}}</a></td>
            <td><a href="anime/{{$anime->id}}">{{$anime->aired}}</a></td>
        </tr>
    @endforeach
</table>

<table id="description" border="1">
    <tr>
        <th>Description</th>
    </tr>
    @foreach($result as $anime)
        <tr>
            <td><a href="anime/{{$anime->id}}">{{$anime->description}}</a></td>
        </tr>
        @endforeach
</table>

<img id="Bleach" src="{{asset('/images/Bleach.png')}}" alt="Bleach" style="width:250px;height:375px">


</body>
</html>


<style>
    #Bleach{
        position: relative;
        bottom: 100px;
    }

    #description{
        position: relative;
        top: 200px;
        left: 285px;
        width: 50%;
    }

    #description td{
        position: relative;
        height: 200px;
    }

    #info {
        margin: 0px auto;
        position: relative;
        top: 185px;
        right: 200px;
        border-collapse: collapse;
        width: 30%;

    }

    #info th {
        height: 25px;
        text-align: left;
    }

    #info a{
        color: black;
    }

</style>

