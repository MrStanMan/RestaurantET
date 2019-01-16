@extends('layouts.menu')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>

<style type="text/css">
    .col-form-label{
        padding: 0px;
    }
</style>
<div class="container">
    <div class="row justify-content-center text-white">
        <div class="col-md-12 col-sm-12 col-12 col-lg-10">
            <div class="card bg-secondary">
                <div class="card-header bg-primary">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="customer_nr" value="42" id="customernr">


                        <div class="form-row col-12">

                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <label for="email" class="form-label text-lg-left">{{ __('E-Mail Adres') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <label for="telephone_nr" class="form-label text-lg-left">{{ __('Telefoon nummer') }}</label>

                                <input id="telephone_nr" type="text" class="form-control{{ $errors->has('telephone_nr') ? ' is-invalid' : '' }}" name="telephone_nr" value="{{ old('telephone_nr') }}" required>

                                @if ($errors->has('telephone_nr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone_nr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row col-12">

                            <div class="form-group col-md-6 col-sm-6 col-12">
                                <label for="password" class="form-label text-lg-left">{{ __('Wachtwoord') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-12">
                                <label for="password-confirm" class="form-label text-lg-left">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-row col-12">
                            
                            <div class="form-group col-md-4 col-sm-4 col-12">
                                <label for="first_name" class="form-label text-lg-left">{{ __('Voornaam') }}</label>

                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>


                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-12">
                                <label for="insertion" class="form-label text-lg-left">{{ __('Tussenvoegsel') }}</label>

                                <input id="insertion" type="text" class="form-control{{ $errors->has('insertion') ? ' is-invalid' : '' }}" name="insertion" value="{{ old('insertion') }}">

                                @if ($errors->has('insertion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('insertion') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-sm-4 col-12">
                                <label for="last_name" class="form-label text-lg-left">{{ __('Achternaam') }}</label>

                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>

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

                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>

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

                                <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" required>

                                @if ($errors->has('town'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-12">
                                <label for="zipcode" class="form-label text-lg-left">{{ __('Postcode') }}</label>

                                <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" required>

                                @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-row mb-0 px-4">
                            <div class="form-group col-md-6 col-sm-6 col-12">
                                <div class="g-recaptcha" data-sitekey="6Ld6LYoUAAAAALa2-tgzZfkYTJ8wIQBdlzLwKssQ"></div>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-12" style="text-align: right;">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registreer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $('#customernr').val(Math.random());
    var customernr = document.getElementById('customernr').value = Math.floor(Math.random() * 99999) + 1;
</script>
@endsection
