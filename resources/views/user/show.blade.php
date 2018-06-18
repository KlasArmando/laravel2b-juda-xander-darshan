@extends('layouts.admin.adminMaster')
@section('content')
    <h2> Show User</h2>
    <strong>Name:</strong> {{ $user->name }} <br>
    <strong>Email:</strong> {{ $user->email }} <br>

    <strong>Roles:</strong>
    @foreach ($user->roles()->pluck('name') as $role)
        {{$role}},
    @endforeach
@endsection