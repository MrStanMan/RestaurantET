@extends('layouts.base')

@section('content')
@php
	$times = collect(['09:00','10:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00']);
@endphp
<div id="resFrom">
	<reservation-form v-bind:reservations="{{$reservations }}"></reservation-form>
</div>

<form action="/reserveer" method="POST">
	@csrf
	<div class="form-row col-12">
    	<div class="form-group col-md-4 col-sm-12 col-12 ">
    	@role('employee')
    		<label for="customer_nr">Klantnummer</label>
            <input type="text" name="customer_nr" class="form-control" value="{{ $admin->customer_nr }}" disabled="">
            <br>
    	@endrole
    		<label for="date">Datum</label>
            <input type="text" name="date" class="form-control" id="date">
            <br>
			<label for="total_guests">Aantal personen</label>
			<input type="text" class="form-control" name="total_guests">
        </div>
		<div class="form-group col-md-4 col-sm-12 col-12 ">
			<label for="time_in">Aankomst tijd</label>
			<select class="custom-select" name="time_in" size="{{ count($times) }}">
			  	@foreach ( $times as $time)
				  	@foreach ( $reservations as $res)
				  	@if ($res->time_in == $time )
				  		<option value="{{ $time }}" class="{{ ($res->time_in == $time) ? 'unavailable' : ''}}">{{ $time }}</option>
				  	@else
				  		<option value="{{ $time }}" class="{{ ($res->time_in <> $time) ? 'available' : ''}}">{{ $time }} {{ $res->time_in }}</option>
				  	@endif
				  	@endforeach
			  	@endforeach
			</select>
		</div>		
		<div class="form-group col-md-4 col-sm-12 col-12 ">
			<label for="table_nr">Selecteer uw tafel</label>
			<select class="custom-select" name="table_nr" size="{{ count($tables) }}">
				@foreach ($tables as $table)
					<option value="{{ $table->table_nr }}" class="{{ $table->status ? 'unavailable' : '' }}">tafel nummer:{{ $table->table_nr }} - aantal stoelen{{$table->total_chairs}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-12 align-items-end">
			<input type="submit" name="submit" value="Reserveer" class="btn btn-primary">
			<br><br>
		    <input type="text" name="table_nr" id="table_nr" disabled="" value="00" class="form-control">
		</div>
    </div>
    
</form>

<div class="col-12 layout mb-3 row">
	@foreach ($tables as $table)
		<div class="col-md-3 col-lg-3 col-sm-6 col-6 table d-flex align-items-center" id="table_{{$table->table_nr}}" value="{{$table->table_nr}}"> 
			<h3 class="slign-self-center">{{ $table->table_nr }}</h3>
		</div>
	@endforeach
</div>

<script type="text/javascript">
$('document').ready(function () {
	$('.table').click(function (nr) {
		console.log(this);
		// console.log($(this).attr('value'));
		$('#table_nr').val($(this).attr('value'));
	});
	$("#date").click(function () {
		console.log($(this).html());
	});
	if ($("#date").val() != '') {
		console.log($('#date').val());
	}

	var dateToday = new Date();
	var dates = jQuery("#date").datepicker({
	    defaultDate: "+1d",
	    changeMonth: true,
	    numberOfMonths: 1,
	    minDate: dateToday,
	    onSelect: function(selectedDate) {
	        var instance = $(this).data("datepicker"),
	            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
	        dates.not(this).datepicker("option", option, date);
	    }
	});
});
</script>
<script src="{{ asset('js/app.js') }}"></script>

@endsection