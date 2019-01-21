@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-12 col-lg-12 col-12 col-sm-12 mb-3">
		<nav class="mb-2">
  			<div class="nav nav-pills" id="nav-tab" role="tablist">
    			<a class="nav-item nav-link active" id="nav-today-tab" data-toggle="tab" href="#nav-today" role="tab" aria-controls="nav-today" aria-selected="true">overzicht van de {{  \Carbon\Carbon::now()->day }}e</a>
    			<a class="nav-item nav-link" id="nav-tomorrow-tab" data-toggle="tab" href="#nav-tomorrow" role="tab" aria-controls="nav-tomorrow" aria-selected="false">overzicht van week {{  \Carbon\Carbon::now()->weekNumberInMonth }}</a>
   				<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">overzicht van de maand {{  \Carbon\Carbon::now()->localeMonth }}</a>
   				<a href="{{ route('reserveer_index') }}" class="btn btn-primary">Nieuwe klanten</a>
  			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
	  		<div class="tab-pane fade show active" id="nav-today" role="tabpanel" aria-labelledby="nav-today-tab">@include('orders.overviewOrdersToday')</div>
	  		<div class="tab-pane fade" id="nav-tomorrow" role="tabpanel" aria-labelledby="nav-tomorrow-tab">@include('orders.overviewOrdersWeekly')</div>
  			<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
		</div>
	</div>
</div>
@endsection