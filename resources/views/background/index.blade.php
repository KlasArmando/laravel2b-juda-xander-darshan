@extends('layouts.master')

@section('content')
<script src="{{asset('js/confirm.js')}}"></script>
@can('background-create')
	<form action="{{route('background.create')}}">
		<input type="submit" value="Create" class="go-right">
	</form>
@endcan
<div class="basic-bar">
	<table>
		<tr>
			<td><strong>Name</strong></td>
		</tr>
		@foreach($backgrounds as $background)
			<tr>
				<td>{{$background->name}}</td>
				@can('background-show')
					<td>
						<form action="{{route('background.show', $background->id)}}">
							<input type="submit" value="Show">
						</form>
					</td>
				@endcan
				@can('background-edit')
					<td>
						<form action="{{route('background.edit', $background->id)}}">
							<input type="submit" value="Edit">
						</form>
					</td>
				@endcan
				@can('background-delete')
					<td>
						<form action="{{route('background.destroy', $background->id)}}" method="post" onsubmit="return confirmDelete()">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<input type="submit" value="Delete">
						</form>
					</td>
				@endcan
			</tr>
		@endforeach
	</table>
</div>
@endsection
