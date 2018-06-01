@extends('layouts.admin.adminMaster')
@section('content')
    <h1>Create User</h1>
    <form action="{{route('user.store')}}" method="POST" class="form">
        @csrf

        <label for="name">Username:</label>
        <input name="name" id="name" type="text"><br>

        <label for="email">Email:</label>
        <input name="email" id="email" type="email"><br>

        <label for="password">Password:</label>
        <input name="password" id="password" type="password"><br>

        <input type="submit" value="Send">
    </form>
@endsection