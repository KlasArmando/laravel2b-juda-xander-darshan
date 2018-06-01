@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <!--can('manga-create')-->
                <a class="btn btn-success" href="{{ route('manga.create') }}"> Create New Manga</a>
                <!--endcan-->
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
	    @foreach ($manga as $m)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $m->title }}</td>
	        <td>{{ $m->description }}</td>
	        <td>
                <form action="{{ route('manga.destroy', $m->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('manga.show',$m->id) }}">Show</a>
                    <!--can('manga-edit')-->
                    <a class="btn btn-primary" href="{{ route('manga.edit',$m->id) }}">Edit</a>
                    <!--endcan-->


                    @csrf
                    @method('DELETE')
                    <!--can('manga-delete')-->
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <!--endcan-->
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $manga->links() !!}


@endsection
