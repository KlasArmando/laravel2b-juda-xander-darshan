@extends('layouts.master')
@section('content')
<h1>Edit Background</h1>
<form action="{{route('background.update', $background)}}" method="POST" class="form">
	{{ method_field('PATCH') }}
	@csrf

	<label for="name">Name:</label>
	<input name="name" id="name" value="{{$background->name}}" type="text"><br>

	<label for="color">Color:</label>
	<input name="color" id="color" value="{{$background->color}}" type="text"><br>

	<br><input type="submit" value="Send">
</form>
@endsection
