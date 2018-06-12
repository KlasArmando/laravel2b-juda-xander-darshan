@extends('layouts.admin.adminMaster')
@section('content')

<h2>Edit category</h2>

<form action="{{ route('category.index') }}">
    <input type="submit" value="Back">
</form>

<form action="{{ route('category.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <strong>Name:</strong>
    <input type="text" name="name" id='name'  placeholder="name">
    <button type="submit">Submit</button>
</form>
@endsection

