@extends('layouts.master')
@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
@endsection
@section('content')
    <div class="grid-contrainer">
        <div class="side-bar basic-bar">
            <div class="avatar">
                <img>
            </div>
            <div class="user-information">
                Username: {{$user->name}} <br>
                Roles:
                    @foreach ($user->roles()->pluck('name') as $role)
                        {{$role}},
                    @endforeach
                    <br>
            </div>
        </div>
        <div class="main-bar basic-bar">
            <div class="stats">
                test<br>test<br>test<br>test<br>test<br>test<br>
            </div>
        </div>
    </div>
@endsection