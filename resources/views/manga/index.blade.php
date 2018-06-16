@extends('layouts.app')
@section('content')
<script src="{{asset('js/confirm.js')}}"></script>
<form action="{{route('manga.search')}}", method="POST">
    @csrf
    <input name="title" placeholder="search">
</form>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manga</h2>
            </div>
            <div class="pull-right">
                @can('manga-create')
                    <a class="btn btn-success" href="{{ route('manga.create') }}"> Create New Manga</a>
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
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($manga as $m)
	    <tr>
	        <td>{{ $m->title }}</td>
	        <td>{{ $m->description }}</td>
	        <td>
                <form action="manga/archive/{{$m->id}}" method="post" onsubmit="return confirmDelete()">
                    @csrf
                    {{ method_field('PATCH') }}
                    <a class="btn btn-info" href="{{ route('manga.show',$m->id) }}">Show</a>

                    @can('manga-edit')
                        <a class="btn btn-primary" href="{{ route('manga.edit',$m->id) }}">Edit</a>
                    @endcan

                    @can('manga-archive')
                        <button type="submit" class="btn btn-danger">Archive</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $manga->links() !!}


@endsection
