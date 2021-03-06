@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Manga</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manga.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('manga.update',$manga->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
 		        <div class="form-group">
 		            <strong>Title:</strong>
 		            <input type="text" name="title" id='title' value="{{$manga->title}}" class="form-control" placeholder="Title">
 		        </div>
 		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
 		        <div class="form-group">
 		            <strong>Chapters:</strong>
 		            <input type="text" name="chapters" id='chapters' value="{{$manga->chapters}}" class="form-control" placeholder="Chapters">
 		        </div>
 		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
 		        <div class="form-group">
 		            <strong>Volumes:</strong>
 		            <input type="text" name="volumes" id='volumes' value="{{$manga->volumes}}" class="form-control" placeholder="Volumes">
 		        </div>
 		    </div>
 		    <div class="col-xs-12 col-sm-12 col-md-12">
 		        <div class="form-group">
 		            <strong>Description:</strong>
 		            <textarea class="form-control" style="height:150px" name="description" id='description' placeholder="Description">{{$manga->description}}</textarea>
 		        </div>
 		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
 		        <div class="form-group">
 		            <strong>Published:</strong>
 		            <input type="date" name="published" id='published' class="form-control" value="{{$manga->published}}" placeholder="Published">
 		        </div>
 		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection
