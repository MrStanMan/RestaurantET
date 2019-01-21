@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-md-6 col-lg-6 col-12 col-sm-12 mb-2">
		<div id="customer-order">
			<customer-order v-bind:reservation="{{$reservation}}" :order="{{$reservation->order}}"></customer-order>
		</div>
	</div>
	<div class="col-md-6 col-lg-6 col-12 col-sm-12" id="order">
		<div id="order">
			<order v-bind:products="{{$products}}" v-bind:reservation="{{$reservation}}"></order>
		</div>
	</div>
</div>
@endsection