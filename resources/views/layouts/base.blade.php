<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
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
			<a href="{{ route('home') }}">
				<img src="{{ asset('img/logo_black.png') }}" id="logo">
			</a>
		</div>
		<div class="col-md-2 navigation">
			<nav class="nav nav-pills flex-column">
				@guest
					<a class="nav-item nav-link {{ (\Request::route()->getName() == 'login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
					<a class="nav-item nav-link {{ (\Request::route()->getName() == 'register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
				@else
					<a class="flex-md-fill nav-item nav-link {{ (\Request::route()->getName() == 'profile_index' || \Request::route()->getName() == 'get_user' || \Request::route()->getName() == 'delete_account' || \Request::route()->getName() == 'admin_home') ? 'active' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->first_name }} <span style="float: right;" ><i class="fas fa-chevron-down"></i></span></a>
					<div class="dropdown-menu">
				      	<a class="dropdown-item" href="{{ url('profile') }}/{{ Auth::user()->customer_nr }}">Mijn account</a>
			      	@role('administrator')
					      	<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="{{ route('admin_home') }}">Admin Pagina</a>
			      	@endrole
			      	@role('employee')
			      			<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="{{ route('orders_home') }}">Bestellingen</a>
			      	@endrole
					      	<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
                                    </a>
			    	</div>
			    @endif
				<a class="flex-sm-fill nav-item nav-link" href="{{ route('about') }}">Over ons</a>
				<a class="flex-sm-fill nav-item nav-link" href="{{ route('contact') }}">Contact</a>
				<a class="flex-sm-fill nav-item nav-link" href="{{ route('menukaart') }}">Menu kaart</a>
				@auth
					<a class="flex-sm-fill nav-item nav-link" href="{{ route('reserveer_index') }}">Reserveren</a>
				@endauth
			</nav>
		</div>
		<div class="col-md-10 col-sm-12 col-lg-10 col-12 mb-4">
			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			@if ( session('error') )
			    <div class="alert alert-danger">
			        {{ session('error') }}
			    </div>
			@endif

			@yield('content')
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script
	  	src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
	  	integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
	  	crossorigin="anonymous"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

</html>
<script src="{{ asset('js/app.js') }}"></script>
</html>
