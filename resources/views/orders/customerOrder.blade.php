@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-2">
		<div class="card">
			<div class="card-header">
				<h2>bestellingen van tafel {{ $reservation->table_nr }} </h2>
			</div>
			<div class="card-body p-0">
				@if($reservation->order === [])
					<p class="card-text">
						Nog geen bestellingen
					</p>
				@else
				<table class="table">
					<thead>
						<tr>
							<th>Naam</th>
							<th>Hoeveelheid</th>
						</tr>
					</thead>
					<tbody>
						<!-- {{$reservation->order[0]->total_ordered}} -->
					@foreach ($reservation->order as $ord)
					<tr>
						<td>{{ $ord->product->product_description }}</td>
						<td>{{ $ord->total_ordered }}x</td>
					</tr>
					@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-6 col-12 col-sm-12" id="order">
		<div id="order">
			<order v-bind:products="{{$products}}" v-bind:reservation="{{$reservation}}"></order>
		</div>
	</div>
</div>
@endsection