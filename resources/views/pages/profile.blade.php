@extends('layouts.base')

@section('content')
<div class="row" style="color: #000 !important;">
<div class="col-md-6 col-lg-6 col-12 col-sm-12">
	<div class="card ">
			<h3 class="card-header">Account gegevens</h3>
		<div class="card_body p-4">
		<p class="card-text">
			<label>Klantnummer:</label><span style="float: right;">{{$user->customer_nr}}</span>
		</p>
		<p class="card-text">
			<label>Voornaam:</label><span style="float: right;">{{$user->first_name}}</span>
		</p>
		<p class="card-text">
			<label>Tussenvoegsel:</label><span style="float: right;">{{$user->insertion}}</span>
		</p>
		<p class="card-text">
			<label>Achternaam:</label><span style="float: right;">{{$user->last_name}}</span>
		</p>
		<p class="card-text">
			<label>Adres:</label><span style="float: right;">{{$user->address}}</span>
		</p>
		<p class="card-text">
			<label>Postcode:</label><span style="float: right;">{{$user->zipcode}}</span>
		</p>
		<p class="card-text">
			<label>Woonplaats:</label><span style="float: right;">{{$user->town}}</span>
		</p>
		</div>
		<div class="card-footer text-muted text-center">
			<a href="{{ url('profile/edit') }}/{{ $user->customer_nr }}" class="btn btn-sm btn-primary">Account aanpassen</a>
			@auth
			<a href="{{ url('profile/delete') }}/{{ $user->customer_nr }}" class="btn btn-sm btn-danger">Verwijder account</a>
			@endauth
		  </div>
	</div>
	<br>
	<div class="card p-4">
			<h2 class="card-title">Reservaties</h2>
		<div class="card_body">
			@if ($user->reservation == [])
			<p class="card-text">
				geen reservaties
			</p>
			@else
			<table class="table"> 
				<tr>
					<th>Datum</th>
					<th>tijd</th>
					<th>Tafelnummer</th>
				</tr>
				@foreach ($user->reservation as $reservation)
					<tr>
						<td>{{$reservation->date}}</td>
						<td>{{$reservation->time_in	}}</td>
						<td>{{$reservation->table[0]->table_nr }}</td>
					</tr>
				@endforeach
			</table>
			@endif
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
	<div class="card">
			<h3 class="card-header">Facturen</h3>
		<div class="card_body p-4">
		@if (!$user->reservation == [])
			<table class="table"> 
				<tr>
					<th>#</th>
					<th>Datum</th>
					<th>tijd</th>
					<th>Tafelnummer</th>
				</tr>
				@foreach ($user->reservation as $reservation)
					<tr>
						<td>{{$reservation->reservation_nr}}</td>
						<td>{{$reservation->date}}</td>
						<td>{{$reservation->time_in	}}</td>
						<td>{{$reservation->table[0]->table_nr }}</td>
					</tr>
				@endforeach
			</table>
			@else
			<p class="card-text">
				geen reservaties
			</p>
			@endif
		</div>
	</div>
</div>
</div>
@endsection