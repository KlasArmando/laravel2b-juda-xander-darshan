@extends('layouts.admin.adminMaster')
@section('content')
    @can('user-create')
        <form action="{{route('user.create')}}">
            <input type="submit" value="Create">
        </form>
    @endcan
    <table>
        <tr>
            <td>Username</td>
            <td>Email</td>
            @can('user-edit')
                <td>Edit</td>
            @endcan
            @can('user-delete')
                <td>Delete</td>
            @endcan
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @can('user-edit')
                    <td>
                        <form action="{{route('user.edit', $user->id)}}">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                @endcan
                @can('user-delete')
                    <td>
                        <form action="{{route('user.delete', $user->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </table>
@endsection