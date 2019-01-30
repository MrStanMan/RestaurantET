@extends('layouts.base')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">Verwijder Account</div>
        <div class="card-body p-1 pt-3">
            <form method="POST" action="{{ url('/profile/delete') }}/{{$user->customer_nr}}">
                @csrf
                @role('administrator')
                <div class="form-group">
                    <p>Weet u zeker dat u dit account wilt verwijderen!<br>
                        Deze actie is niet terug te draaien!<br>
                        <b>Als administrator hoeft u geen wachtwoord in te vullen</b>
                    </p>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                        <input type="submit" class="btn btn-lg btn-danger" name="submit">
                    </div>
                </div>
                @endrole
                <div class="form-row col-12">
                    <div class="form-group col-md-6 col-sm-12 col-12">
                        <label for="password" class="form-label text-lg-left">Wachtwoord</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-12">
                        <label for="password_confirmed" class="form-label text-lg-left">Wachtwoord herhalen</label>
                        <input type="password" name="password_confirmed" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-6 col-12">
                        <div class="g-recaptcha" data-sitekey="6Ld6LYoUAAAAALa2-tgzZfkYTJ8wIQBdlzLwKssQ"></div>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-12">
                        <input type="submit" class="btn btn-lg btn-danger" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
