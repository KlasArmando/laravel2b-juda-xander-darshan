@extends('layouts.admin.adminMaster')
@section('content')
    <h1>Create Role</h1>
    <form action="{{route('role.store')}}" method="POST" class="form">
        @csrf

        <label for="name">Name:</label>
        <input name="name" id="name" type="text"><br>

        <label for="permissions">Permissions:</label><br>
        @foreach($permissions as $p)
            <input name="permissions[]" id="permissions{{$p->id}}" type="checkbox" value="{{$p->id}}">{{$p->name}}<br>
        @endforeach

        <br><input type="submit" value="Send">
    </form>
@endsection
