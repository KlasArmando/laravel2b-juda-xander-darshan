@extends('layouts.master')
@section('content')
    <div class="home-main">
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
@endsection
<!--
    - possible anime/manga reccomendations?
    - latest anime/manga added?
    - your list preview?
-->
