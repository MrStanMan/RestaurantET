@extends('layouts.base')

@section('content')
<div class="contact">
	<div class="contact-left">
		<h2 class="h2">Contact</h2>
		<div class="text">
			Neem hier contact op met ons restaurant!
		</div>
		<div class="form">
			<form method="POST" action="">
				@csrf
				<div class="form-group">
					<label for="contactname">Naam <i style="color: red;">*</i></label>
					<input type="text" class="form-control" id="contactname" required>
				</div>
				<div class="form-group">
					<label for="contactemail">Email <i style="color: red;">*</i></label>
					<input type="text" class="form-control" id="contactemail" required>
				</div>
				<div class="form-group">
					<label for="contactmessage">Uw bericht <i style="color: red;">*</i></label>
					<textarea class="form-control" id="contactmessage" rows="3" required></textarea>
				</div>
				
				<div class="form-group" width="100%">
					<label><i style="color: red;">*</i> Vereist</label>
					<button type="submit" class="btn btn-primary contact-send">Verstuur</button>
				</div>	
			</form>
		</div>
	</div>	
	<div class="contact-right">
		<h3>Restaurant Excellent Taste</h3>
		<h5>Adres</h5>
		<p>Luttekestraat 66</p>
		<p>8011 LS Zwolle</p>
		<br>
		<br>
		<h5>Telefoonnummer</h5>
		<p>+31 644363054</p>
	</div>
</div>
@endsection
