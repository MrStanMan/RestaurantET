<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


	<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 jumbotron">
			<img src="{{ asset('img/logo_black.png') }}">
		</div>
		<div class="col-md-2">
			<nav class="nav nav-pills flex-column">
				@guest
					<a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					<a class="nav-item nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				@else
					<a class="flex-md-fill nav-item nav-link active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->first_name }} <span style="float: right;" ><i class="fas fa-chevron-down"></i></span></a>
					<div class="dropdown-menu">
				      	<a class="dropdown-item" href="{{ url('profile') }}/{{ Auth::user()->customer_nr }}">Mijn account</a>
					      	<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="#">Admin Pagina</a>
					      	<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
			    	</div>
			    @endif
			  <a class="flex-sm-fill nav-item nav-link" href="{{ route('about') }}">Over ons</a>
			  <a class="flex-sm-fill nav-item nav-link" href="{{ route('contact') }}">Contact</a>
			  <a class="flex-sm-fill nav-item nav-link" href="{{ route('menukaart') }}">Menu kaart</a>
			  <a class="flex-sm-fill nav-item nav-link" href="#">Reserveren</a>
			</nav>
		</div>
	<!-- <div class="container"> -->
		<div class="col-md-10 col-sm-10 col-lg-10 col-10">
			@yield('content')
		</div>
	<!-- </div> -->
	</div>
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>