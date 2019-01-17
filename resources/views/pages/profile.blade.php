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
	<div class="card p-4">
		<div class="card_body">
			<h2 class="card-title">Reservaties</h2>
		<p class="card-text">
			@if ($user->reservation == NULL)
				geen reservaties
			@else
				{{$user->reservation}}
			@endif
		</p>
		</div>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
	<div class="card p-4">
		<div class="card_body">
			<h2 class="card-title">Facturen</h2>
		<p class="card-text">
			Je hebt nog geen facturen
		</p>
		</div>
	</div>
</div>
</div>
@endsection