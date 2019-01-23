@extends('layouts.base')

@section('content')
<div id="order">
	<order-customer v-bind:products="{{$products}}" v-bind:reservation="{{$reservation}}"></order-customer>
</div>
@endsection