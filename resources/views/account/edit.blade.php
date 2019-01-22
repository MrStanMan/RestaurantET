@extends('layouts.base')

@section('content')
<div class="card">
	<div class="card-header">Account gegevens</div>
	<div class="card-body">
	<form action="{{ url('/profile/edit') }}/{{$user->customer_nr}}" method="POST">
		@csrf
		<div class="form-row col-12">

            <div class="form-group col-md-6 col-sm-12 col-12">
                <label for="email" class="form-label text-lg-left">{{ __('E-Mail Adres') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6 col-sm-12 col-12">
                <label for="telephone_nr" class="form-label text-lg-left">{{ __('Telefoon nummer') }}</label>

                <input id="telephone_nr" type="text" class="form-control{{ $errors->has('telephone_nr') ? ' is-invalid' : '' }}" name="telephone_nr" value="{{ $user->telephone_nr }}">

                @if ($errors->has('telephone_nr'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telephone_nr') }}</strong>
                    </span>
                @endif
            </div>
        </div>

		<div class="form-row col-12">
            
            <div class="form-group col-md-4 col-sm-4 col-12">
                <label for="first_name" class="form-label text-lg-left">{{ __('Voornaam') }}</label>

                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" autofocus>


                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-4 col-sm-4 col-12">
                <label for="insertion" class="form-label text-lg-left">{{ __('Tussenvoegsel') }}</label>

                <input id="insertion" type="text" class="form-control{{ $errors->has('insertion') ? ' is-invalid' : '' }}" name="insertion" value="{{ $user->insertion }}">

                @if ($errors->has('insertion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('insertion') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-4 col-sm-4 col-12">
                <label for="last_name" class="form-label text-lg-left">{{ __('Achternaam') }}</label>

                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}">

                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
		<div class="form-row col-12">
            <div class="form-group col-12">
                <label for="address" class="form-label text-lg-left">{{ __('Adres') }}</label>

                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}">

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row col-12">

            <div class="form-group col-md-6 col-sm-6 col-12">
                <label for="town" class="form-label text-lg-left">{{ __('Stad') }}</label>

                <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ $user->town }}">

                @if ($errors->has('town'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('town') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6 col-sm-6 col-12">
                <label for="zipcode" class="form-label text-lg-left">{{ __('Postcode') }}</label>

                <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ $user->zipcode }}">

                @if ($errors->has('zipcode'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('zipcode') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-12">
    		<input type="submit" name="submit" value="Aanpassen" class="btn btn-success">
        </div>
	</form>
	</div>
</div>
<br>
<div class="card">
	<div class="card-header">Verander Wachtwoord</div>
	<div class="card-body">
    <form method="POST" action="{{ url('profile/password/update') }}/{{$user->customer_nr}}">
        @csrf

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Oud wachtwoord') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bevestig wachtwoord') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group row">
            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('Nieuw wachtwoord') }}</label>

            <div class="col-md-6">
                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                @if ($errors->has('new_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">
                    {{ __('verrander wachtwoord') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection