@extends('layouts.base')

@section('content')
@foreach ($users as $user)
	{{ $user->first_name }}<br>
@endforeach
@endsection