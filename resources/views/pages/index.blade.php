@extends('layouts.base')

@section('content')
<div class="homepage">
	<div id="homepageCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="http://www.studiomova.nl/wp-content/themes/mova/img/cuttlery.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="http://www.academiabarilla.com/anteprima_pizzamargherita_xhm1p-2_1200.jpg?h=faa3bae42d7180a508c490395249247ded3f362c" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://www.24kitchen.nl/files/styles/3x2_960w/public/2017-11/GK120179_ARAB_soep_Tunesische%20soep%20met%20lamsvlees.jpg?itok=KiOUvxne" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#homepageCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#homepageCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	Welkom op de website van Restaurant Excellent Taste! <br>
	Op deze website kunt u doormiddel van een account reserveren voor een gezellig avondje eten! <br>
	
</div>
@endsection