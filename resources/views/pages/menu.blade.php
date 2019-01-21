@extends('layouts.base')

@section('content')
<div class="col-md-12 menu"> 
	@foreach ($menu->groupBy('category') as $category)
		<div class="col-md-12">
			<h1 class="text-center display-3">{{ $category->unique('category')[0]->category }}</h1>
			<br>
			<div class="row">
			@foreach ($category as $menu_item)
			<div class="col-md-12 col-lg-12 text-left h4"> 
				{{ $menu_item->product_description }}
				<span style="float: right;">&#8364;	{{ $menu_item->price }}</span>
			</div>
			@endforeach
		</div>
			<div class="hr"></div>
		</div>
	@endforeach
</div>
@endsection