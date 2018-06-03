@section('Favicon')
<link rel="shortcut icon" type="image/png" href="../../../../public/images/Favicon.png">
@show

@section('logo')
<img id="Logo" src="{{asset('/images/Logo.png')}}" alt="Communism" style="width:400px;height:90px">

@show

@section('navbar')
<nav id="navbar">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Anime</a></li>
        <li><a href="#">Manga</a></li>
        <li><a href="#">Login</a></li>
    </ul>
</nav>

<style>

    #Logo{
        position: relative;
        bottom: 800px;
        right: 250px;
    }

    body{
        background-color: #99ffcc;
    }

    #navbar{
        position: relative;
        bottom: 800px;
    }

    #navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: lightblue;
    }

    #navbar li {
        float: left;
    }

    #navbar a {
        display: block;
        padding: 8px;
        background-color: lightblue;
    }

    #navbar li a {
        display: block;
        width: 60px;
        color: black
    }

    #navbar li a:hover {
        background-color: lightskyblue;
    }
</style>

    @show

