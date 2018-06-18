@extends('layouts.master')
@section('content')
    <div class="home-main">
        <div class="anime">
            <!--anime stuff goes here-->
            Placeholder for anime
        </div>
        <div class="manga">
            <!--manga stuff goes here-->
            Placerholder for manga
        </div>
        <div class="latest">
            <!--latest stuff goes here-->
            Placeholder for latest anime / manga added
        </div>
        @can('anime-list')
            <div class="list">
                <!--own list stuff goes here-->
                Placeholder for your own user page preview
            </div>
        @endcan
    </div>
@endsection
<!--
    - possible anime/manga reccomendations?
    - latest anime/manga added?
    - your list preview?
-->
