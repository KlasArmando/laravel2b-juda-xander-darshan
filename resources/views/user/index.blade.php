@extends('layouts.admin.adminMaster')
@section('content')
    <form action="{{route('user.create')}}">
        <input type="submit" value="Create">
    </form>
    <table>
        <tr>
            <td>Username</td>
            <td>Email</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="{{route('user.edit', $user->id)}}">
                        <input type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="{{route('user.delete', $user->id)}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection