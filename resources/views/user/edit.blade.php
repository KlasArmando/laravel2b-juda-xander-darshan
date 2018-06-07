@extends('layouts.admin.adminMaster')
@section('content')
     <h1>Edit User</h1>
     <form action="{{route('user.update', $user)}}" method="POST" class="form">
         {{ method_field('PATCH') }}
         @csrf

         <label for="name">Username:</label>
         <input name="name" id="name" value="{{$user->name}}" type="text"><br>

         <label for="email">Email:</label>
         <input name="email" id="email" value="{{$user->email}}" type="email"><br>

         <label for="password">Password:</label>
         <input name="password" id="password" type="password"><br>

         <label for="roles">Roles:</label><br>
         @foreach($roles as $role)
             @if($user->hasRole($role->name))
                <input name="roles[]" id="roles{{$role->id}}" type="checkbox" value="{{$role->id}}" checked>{{$role->name}}<br>
             @else
                 <input name="roles[]" id="roles{{$role->id}}" type="checkbox" value="{{$role->id}}">{{$role->name}}<br>
             @endif
         @endforeach

         <br><input type="submit" value="Send">
     </form>
@endsection