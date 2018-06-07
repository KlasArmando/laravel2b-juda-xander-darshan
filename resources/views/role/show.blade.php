@extends('layouts.admin.adminMaster')
@section('content')
    <h2> Show Role</h2>
    <strong>Name:</strong> {{ $role->name }} <br>

    <strong>Permissions:</strong>
    @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
            <label>{{ $v->name }},</label>
        @endforeach
    @endif
@endsection
