@extends('layouts.base')

@section('content')
<div class="row">
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
	<div class="card p-0">
			<h2 class="card-header px-4 pt-3">Reservaties</h2>
		<div class="card_body">
			@foreach ($user->reservation as $reservation)
				@if($reservation->date == $today)
					<h4 class="card-title px-2 pt-2">
						Vandaag
					</h4>
					<table class="table">
					<tr>
						<td>{{$reservation->date}}</td>
						<td>{{$reservation->time_in	}}</td>
						<td>{{$reservation->table_nr }}</td>
					</tr>
				</table>
				@endif
			@endforeach
			<h4 class="card-title px-2 pt-2">
				Toekomst
			</h4>
			<table class="table"> 
				<tr>
					<th>Datum</th>
					<th>tijd</th>
					<th>Tafelnummer</th>
					<th>Bekijk</th>
				</tr>
				@foreach ($user->reservation as $reservation)
					<tr>
						<td>{{$reservation->date}}</td>
						<td>{{$reservation->time_in	}}</td>
						<td>{{$reservation->table_nr }}</td>
						<td><a href="/profile/{{ $user->customer_nr }}/bestelling/{{$reservation->reservation_nr}}" style="text-align: center;"><i class="fas fa-eye fa-lg"></i></a>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
	<div class="card">
			<h3 class="card-header">Facturen</h3>
		<div class="card_body p-4">
		<p class="card-text">
			Je hebt nog geen facturen
		</p>
		</div>
	</div>
</div>
</div>
@endsection