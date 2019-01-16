@extends('layouts.base')

@section('content')
<div class="col-md-12"> 
	@foreach ($menu->groupBy('category') as $category)
		<div class="col-md-12">
			<h1>{{ $category->unique('category')[0]->category }}</h1>
			<br>
			@foreach ($category as $menu_item)
				{{ $menu_item->product_description }}<br>
			@endforeach
			<hr>
		</div>
	@endforeach
</div>
@endsection