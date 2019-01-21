@extends('layouts.base')

@section('content')
<div id="order">
	<order v-bind:products="{{$products}}" v-bind:reservation="{{$reservation}}"></order>
</div>
@endsection