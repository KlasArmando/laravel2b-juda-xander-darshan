@extends('layouts.admin.adminMaster')
@section('content')
    @can('user-create')
        <form action="{{route('role.create')}}">
            <input type="submit" value="Create" class="go-right">
        </form>
    @endcan

    <table>
        <tr>
            <th>Name</th>
            <th width="280px" colspan="3">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->name }}</td>
                @can('role-show')
                    <td>
                        <form action="{{route('role.show', $role->id)}}">
                            <input type="submit" value="Show">
                        </form>
                    </td>
                @endcan
                @can('role-edit')
                    <td>
                        <form action="{{route('role.edit', $role->id)}}">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                @endcan
                @can('role-delete')
                    <td>
                        <form action="{{route('role.delete', $role->id)}}" method="post" onsubmit="return confirmDelete()">
                            {{ method_field('DELETE') }}{{ csrf_field() }}
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </table>
@endsection
