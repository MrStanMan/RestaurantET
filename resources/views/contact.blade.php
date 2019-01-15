@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
						<div class="form-group">
							<label for="contactname">Naam</label>
							<input type="text" class="form-control" id="contactname">
						</div>
						<div class="form-group">
							<label for="contactemail">Email</label>
							<input type="text" class="form-control" id="contactemail">
						</div>
						<div class="form-group">
							<label for="contactmessage">Uw bericht</label>
							<textarea class="form-control" id="contactmessage" rows="3"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Verstuur</button>
						</div>	
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection