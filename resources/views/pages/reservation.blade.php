@extends('layouts.base')

@section('content')
	<form action="/reserveer" method="POST">
		@csrf
		<input type="text" name="total_guests">
		<input type="date" name="date">
		<input type="submit" name="submit" value="Reserveer">
	</form>
@endsection