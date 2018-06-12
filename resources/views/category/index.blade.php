@extends('layouts.admin.adminMaster')
@section('content')

    @can('category-create')
        <form action="{{ route('category.create')}}">
            <input type="submit" value="create" class="go-right">
        </form>
    @endcan

    <table>
        <tr>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $c)
            <tr>
                <td>{{ $c->name }}</td>
                @can('category-show')
                    <td>
                        <form action="{{ route('category.show', $c->id) }}">
                            <input type="submit" value="Show">
                        </form>
                    </td>
                @endcan

                @can('category-edit')
                    <td>
                        <form action="{{ route('category.edit',$c->id)}}">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                @endcan

                @can('category-delete')
                    <td>
                        <form action="{{route('category.destroy', $c->id)}}" onsubmit="return confirmDelete()" method="post">
                            @csrf
                            {{method_field('delete')}}
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </table>
@endsection
