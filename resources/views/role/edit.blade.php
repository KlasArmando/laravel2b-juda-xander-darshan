@extends('layouts.admin.adminMaster')
@section('content')
    <h2>Edit Role</h2>
    <form action="{{route('role.update', $role->id)}}" method="POST" class="form">
        {{ method_field('PATCH') }}
        @csrf

        <label for="name">Name:</label>
        <input name="name" id="name" type="text" value="{{$role->name}}"><br>

        <label for="permissions">Permissions:</label><br>
        @foreach($permissions as $p)
            @if($role->hasPermissionTo($p->name))
                <input name="permissions[]" id="permissions{{$p->id}}" type="checkbox" value="{{$p->id}}" checked>{{$p->name}}<br>
            @else
                <input name="permissions[]" id="permissions{{$p->id}}" type="checkbox" value="{{$p->id}}">{{$p->name}}<br>
            @endif
        @endforeach

        <br><input type="submit" value="Send">
    </form>
@endsection
