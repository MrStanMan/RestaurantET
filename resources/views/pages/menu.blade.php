@extends('layouts.base')

@section('content')
<div class="col-md-12"> 
	@foreach ($menu->groupBy('category') as $category)
		<div class="col-md-12">
			<h1>{{ $category->unique('category')[0]->category }}</h1>
			<br>
			<div class="row">
			@foreach ($category as $menu_item)
			<div class="col-md-3 col-lg-3" style="border-right: 1px solid black"> 
				{{ $menu_item->product_description }}<br>
				{{ $menu_item->price }}<br>
			</div>
			@endforeach
		</div>
			<hr>
		</div>
	@endforeach
</div>
@endsection