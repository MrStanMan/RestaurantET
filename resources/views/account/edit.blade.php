@extends('layouts.base')

@section('content')
	<form action="{{ url('/profile/edit') }}/{{$customer_nr}}" method="POST">
		@csrf
		<input type="text" name="first_name">
		<input type="text" name="last_name">
		<input type="submit" name="submit" value="Aanpassen" class="btn btn-success">
	</form>
@endsection