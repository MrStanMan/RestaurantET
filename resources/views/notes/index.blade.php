@extends('layouts.base')

@section('content')

	<div style="width: 800px; margin: 0 auto;">
	
	<div style="width: 100%; margin: 20px 0; background: #000; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px;">INVOICE</div>
	
	<div style="overflow: hidden;">
		<div>
			<span style="float: right; margin-top: 0%;">
			
				<br/>
				
				<br/>
				
				<br/>
				
			</span>
		</div>
		
		<br/><br/><br/><br/><br/>
			
		<table style="margin-top: 1px; width: 300px; float: right; border-collapse: collapse;">
			<tr>
				<td style="text-align: left; background: #000; border: 1px solid black; padding: 5px;">INVOICE</td>
				<td style="text-align: right; border: 1px solid black; padding: 5px;">#'.$invoice.'</td>
			</tr>
			<tr>
				<td style="text-align: left; background: #000; border: 1px solid black; padding: 5px;">DATE</td>
				<td style="text-align: right; border: 1px solid black; padding: 5px;">'.$date.'</td>
			</tr>
		</table>
	</div>
		
	<table style="clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; border-collapse: collapse;">
		<tr>
			<th style="border: 1px solid black; padding: 5px; background: #000;">PRODUCT</th>
			<th style="border: 1px solid black; padding: 5px; background: #000;">DESCRIPTION</th>
			<th style="border: 1px solid black; padding: 5px; background: #000;">UNIT COST</th>
			<th style="border: 1px solid black; padding: 5px; background: #000;">QUANTITY</th>
			<th style="border: 1px solid black; padding: 5px; background: #000;">PRICE</th>
		</tr>
		
		@foreach($users as $user)
		<tr style='border-bottom: 1px solid #000;'>
			<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>{{ $user->customer_nr }}</td>
			<td style='border: 1px solid black; padding: 5px; vertical-align: top; width: 300px; text-align: left;'>{{ $user->last_name }}</td>
			<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>{{ $user->first_name }}</td>
			<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>{{ $user->address }}</td>
			<td style='border: 1px solid black; padding: 5px; vertical-align: top; text-align: left;'>&euro; ".$product_total."</td>
		</tr>
		@endforeach
					
		<tr>
			<td style="border: 1px solid black; padding: 5px; border: 0;" colspan="3"></td>
			<td style="border: 1px solid black; padding: 5px; border-right: 0; text-align: right; text-align: left; background: #000;" colspan="1">COMMENCEMENT</td>
			<td style="border: 1px solid black; padding: 5px;">&euro; </td>
		</tr>
		<tr>
			<td style="border: 1px solid black; padding: 5px; border: 0;" colspan="3"></td>
			<td style="border: 1px solid black; padding: 5px; border-right: 0; text-align: right; text-align: left; background: #000;" colspan="1">TOTAL</td>
			<td style="border: 1px solid black; padding: 5px;">&euro; </td>
		</tr>
	</table>
	
</div>

<button>
	<span><a href="{{ url('profile/notes') }}/{{ $user->customer_nr }}/download"/>PDF</span>
</button>
	
@endsection