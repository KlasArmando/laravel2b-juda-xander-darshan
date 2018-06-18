@extends('layouts.master')
@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/user.css')}}">
@endsection
@section('content')
    <div class="basic-bar margin-top">
        <table>
            <tr>
                <td><strong>Username</strong></td>
                <td><strong>Show</strong></td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <form action="{{route('user.publicShow', $user->id)}}">
                            <input type="submit" value="Show">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection