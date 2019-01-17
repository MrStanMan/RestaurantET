@extends('layouts.base')

@section('content')
<table class="table table-striped">
	<thead>
	</thead>
	<tbody>
@foreach ($users as $user)
<tr> 
	<th>{{ $user->customer_nr }}</th>
	<td>{{ $user->first_name }}</td>
	<td>{{ $user->last_name }}</td>
	<td><a href="{{ url('/profile/edit') }}/{{$user->customer_nr}}" class="btn btn-sm btn-primary">Account aanpassen</a>
			<a href="{{ url('/profile/delete') }}/{{$user->customer_nr}}" class="btn btn-sm btn-danger">Verwijder account</a></td>
</tr>
@endforeach
</tbody>
</table>
@endsection