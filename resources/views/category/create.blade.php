@extends('layouts.admin.adminMaster')
@section('content')

<h2>Add New category</h2>

<form action="{{ route('category.index') }}">
    <input type="submit" value="Back">
</form>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <strong>Name:</strong>
        <input type="text" name="name" id='name' placeholder="name">
        <button type="submit">Submit</button>
    </form>
@endsection
