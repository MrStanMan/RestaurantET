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
							<button style="margin-left: calc(100% - 139px);" type="submit" class="btn btn-primary">Verstuur</button>
						</div>	
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
