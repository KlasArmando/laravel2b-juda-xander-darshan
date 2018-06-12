@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Anime</h2>
            </div>
            <div class="pull-right">
                @can('anime-create')
                    <a class="btn btn-success" href="{{ route('anime.create') }}"> Create New Anime</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($anime as $a)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $a->title }}</td>
                <td>{{ $a->description }}</td>
                <td>
                    <form action="anime/archive/{{$a->id}}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <a class="btn btn-info" href="{{ route('anime.show',$a->id) }}">Show</a>

                        @can('anime-edit')
                            <a class="btn btn-primary" href="{{ route('anime.edit',$a->id) }}">Edit</a>
                        @endcan

                        @can('anime-archive')
                            <button type="submit" class="btn btn-danger">Archive</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $anime->links() !!}


@endsection
