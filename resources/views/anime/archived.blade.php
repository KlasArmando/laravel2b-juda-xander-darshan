@extends('layouts.admin.adminMaster')
@section('content')
    <table>
        <tr>
            <td><strong>Title</strong></td>
            @can('anime-edit')
                <td><strong>Edit</strong></td>
            @endcan
            @can('anime-reuse')
                <td><strong>ReUse</strong></td>
            @endcan
            @can('anime-delete')
                <td><strong>Delete</strong></td>
            @endcan
        </tr>
        @foreach($anime as $a)
            <tr>
                <td>{{$a->title}}</td>
                @can('anime-edit')
                    <td>
                        <form action="{{route('manga.edit', $a->id)}}">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                @endcan
                @can('anime-reuse')
                    <td>
                        <form action="#">
                            <input type="submit" value="ReUse">
                        </form>
                    </td>
                @endcan
                @can('anime-delete')
                    <td>
                        <form action="{{route('anime.destroy', $a->id)}}" method="post" onsubmit="return confirmDelete()">
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