@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--<div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>-->
                <div class="card-header">Welcome</div>
                <div class="card-body">
                    OurAnimeList
                </div>
                <!--
                Home Suggestions
                    - possible anime/manga reccomendations?
                    - latest anime/manga added?
                    - your list preview?

                MediaQuery
                    - Adapts CSS to phones, that's its only use (use for phones [duh])
                        https://www.w3schools.com/css/css_rwd_mediaqueries.asp

                CSS3 Grid
                    - Easy to use blueprint for footers/headers etc. (use as base layout)
                        https://css-tricks.com/snippets/css/complete-guide-grid/

                Flexbox
                    - Little more complex way of arranging multiple containers (use it for the many lists)
                        https://css-tricks.com/snippets/css/a-guide-to-flexbox/

                SCSS
                    - Just CSS but with a few extra's (use in general)
                        https://sass-lang.com/guide
                -->
            </div>
        </div>
    </div>
</div>

@endsection
