@extends('layouts.base')

@section('content')
<div id="resFrom">
	<reservation-form v-bind:reservations="{{ $reservations }}" v-bind:tables="{{ $tables }}" v-bind:user="{{ $user }}"></reservation-form>
</div>
@endsection