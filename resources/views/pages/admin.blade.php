@extends('layouts.base')

@section('content')
<div class="mb-4">
    <a href="{{ url('/admin/bestellingen') }}" class="btn btn-primary nav-item nav-link ">bekijk bestellingen</a>
</div>
<table class="table table-striped">
    <thead>
		<tr>
			<th>Klantnummer</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Email</th>
			<th style="text-align:center;">Acties</th>
		</td>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{ $user->customer_nr }}</th>
            <td>{{ $user->first_name }}</td>
			<td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ url('/profile/edit') }}/{{$user->customer_nr}}" class="btn btn-sm btn-primary">Account aanpassen</a>
                <a href="{{ url('/profile/delete') }}/{{$user->customer_nr}}" class="btn btn-sm btn-danger">Verwijder account</a>
                @if ($user->status == '0')
                <a href="{{ url('/profile/block') }}/{{$user->customer_nr}}" class="btn btn-sm btn-secondary">Account blokkeren</a>
                @else
                <a href="{{ url('/profile/block') }}/{{$user->customer_nr}}" class="btn btn-sm btn-secondary">Account deblokkeren</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
