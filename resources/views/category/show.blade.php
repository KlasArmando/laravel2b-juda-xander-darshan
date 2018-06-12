@extends('layouts.admin.adminMaster')
@section('content')

<h2> Show category </h2>

<form action="{{ route('category.index') }}">
<input type="submit" value="Back">
</form>

<strong>Name:</strong>
{{ $category->name }}
@endsection



