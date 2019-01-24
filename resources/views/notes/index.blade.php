@extends('layouts.base')

@section('content')

<div class="card">
		<div style="width: 800px; margin: 0 auto;">
		
		<div style="width: 100%; margin: 20px 0; background: #000; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px;">FACTUUR</div>
		
		@if(!$orders->first())
			Er is nog geen bestelling gedaan.
		@else
			<div style="overflow: hidden;">
				<div>
					<img src="http://localhost:8000/img/logo_black.png" id="logo">
					<span style="float: right; margin-top: 0%;">
						
					</span>
				</div>
				
				<br/><br/>
					
				<table style="margin-top: 1px; width: 300px; float: right; border-collapse: collapse;">
					<tr>
						<td style="text-align: left; background: #000; color: #fff; border: 1px solid black; padding: 5px;">KLANT NR</td>
						<td style="text-align: right; border: 1px solid black; padding: 5px;">{{ $reservation[0]->customer_nr }}</td>
					</tr>
					<tr>
						<td style="text-align: left; background: #000; color: #fff; border: 1px solid black; padding: 5px;">PERSONEN</td>
						<td style="text-align: right; border: 1px solid black; padding: 5px;">{{ $reservation[0]->total_guests }}</td>
					</tr>
					<tr>
						<td style="text-align: left; background: #000; color: #fff; border: 1px solid black; padding: 5px;">TAFEL</td>
						<td style="text-align: right; border: 1px solid black; padding: 5px;">{{ $reservation[0]->table_nr }}</td>
					</tr>
					<tr>
						<td style="text-align: left; background: #000; color: #fff; border: 1px solid black; padding: 5px;">DATUM</td>
						<td style="text-align: right; border: 1px solid black; padding: 5px;">{{ $reservation[0]->date }}</td>
					</tr>
				</table>
			</div>
		
			<table style="clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; border-collapse: collapse;">
				<tr>
					<th style="border: 1px solid black; padding: 5px; color: #fff; background: #000;">PRODUCT</th>
					<th style="border: 1px solid black; padding: 5px; color: #fff; background: #000;">AANTAL</th>
					<th style="border: 1px solid black; padding: 5px; color: #fff; background: #000;">PRIJS</th>
				</tr>
				
				@php 
					$total_price = [];
				@endphp
				@foreach($orders as $order)
					
					@php
						$product_total = $order->total_ordered * $order->product[0]->price;
							
						$total_price[] .= $product_total;
					@endphp
					
					<tr style='border-bottom: 1px solid #000;'>
						<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>{{ $order->product[0]->product_description}}</td>
						<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>{{ $order->total_ordered }}</td>
						<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>&euro; {{ number_format($product_total, 2) }}</td>
					</tr>
				@endforeach
					
				<tr>
					<td style="border: 1px solid black; padding: 5px; border: 0;" ></td>
					<td style="border: 1px solid black; padding: 5px; border-right: 0; color: #fff; text-align: right; text-align: left; background: #000;" colspan="1">TOTAAL</td>
					<td style="border: 1px solid black; padding: 5px;">&euro; {{ array_sum($total_price) }}</td>
				</tr>
			</table>
		@endif
	</div>
	
	</br>
	
	<div class="card-footer text-muted text-center">
		<a href="{{ URL::previous() }}" class="btn btn-sm btn-danger">
			Terug
		</a>
		@if(empty($order))
			
		@else
			<a href="{{ url('profile/notes') }}/{{ $order->reservation_nr }}/{{ $user->customer_nr }}/download" class="btn btn-sm btn-primary">
				DOWNLOADEN
			</a>
		@endif
	</div>
</div>
	
@endsection