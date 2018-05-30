@extends('layouts.admin.adminMaster')
@section('content')
    <table>
        <tr>
            <td>Username</td>
            <td>Email</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>
@endsection