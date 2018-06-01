@extends('layouts.admin.adminMaster')
@section('content')
     <h1>Edit User</h1>
     <form action="{{route('user.update', $user)}}" method="POST" class="form">
         {{ method_field('PATCH') }}
         @csrf

         <label for="name">Username:</label>
         <input name="name" id="name" placeholder="{{$user->name}}" type="text"><br>

         <label for="email">Email:</label>
         <input name="email" id="email" placeholder="{{$user->email}}" type="email"><br>

         <label for="password">Password:</label>
         <input name="password" id="password" type="password"><br>

         <input type="submit" value="Send">
     </form>
@endsection