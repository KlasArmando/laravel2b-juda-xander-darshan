@extends('layouts.admin.adminMaster')
@section('content')
    <table>
        <tr>
            <td><strong>Title</strong></td>
            @can('manga-edit')
                <td><strong>Edit</strong></td>
            @endcan
            @can('manga-reuse')
                <td><strong>ReUse</strong></td>
            @endcan
            @can('manga-delete')
                <td><strong>Delete</strong></td>
            @endcan
        </tr>
        @foreach($manga as $m)
            <tr>
                <td>{{$m->title}}</td>
                @can('manga-edit')
                    <td>
                        <form action="{{route('manga.edit', $m->id)}}">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                @endcan
                @can('manga-reuse')
                    <td>
                        <form action="#">
                            <input type="submit" value="ReUse">
                        </form>
                    </td>
                @endcan
                @can('manga-delete')
                    <td>
                        <form action="{{route('manga.destroy', $m->id)}}" method="post" onsubmit="return confirmDelete()">
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