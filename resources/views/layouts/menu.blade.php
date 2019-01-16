<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/
.body, html {
	max-height: 85vh;
	overflow: hidden;
}

.navbar-inverse {
	height: 65px;
	background-color: #3c3c3c !important;
}

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 220px;
    margin: 0;
    padding: 0;
    list-style: none;
	height: -webkit-fill-available;
    background: #a0a0a0;
}

.sidebar-nav li {
    position: relative; 
    line-height: 20px;
    width: 100%;
}

.sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 3px;
    background-color: #1c1c1c;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}
.sidebar-nav li:first-child a {
    color: #fff;
    background-color: #3c3c3c;
}

.sidebar-nav li:nth-child(2):before,
.sidebar-nav li:nth-child(3):before,
.sidebar-nav li:nth-child(4):before,
.sidebar-nav li:nth-child(5):before,
.sidebar-nav li:nth-child(6):before,
.sidebar-nav li:nth-child(7):before,
.sidebar-nav li:nth-child(8):before
{
    background-color: #b1b1b1;   
}

.sidebar-nav li:hover:before,
.sidebar-nav li.open:hover:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}

.sidebar-nav li a
{
    display: block;
    color: #000;
    text-decoration: none;
    padding: 10px 15px 10px 30px;    
}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus,
.sidebar-nav li.open a:hover,
.sidebar-nav li.open a:active,
.sidebar-nav li.open a:focus{
    color: #000;
    text-decoration: none;
    /*background-color: transparent*/
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 44px;
}
.sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;
}

#profilelinks {
    height: 40px;
    background: #f5f5f5;
}

#profilelinks span {
    width: 80%;
    height: 2px;
    margin: 0 auto;
    display: block;
    transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
}
</style>
<body>

    <div id="app">
		<div id="wrapper">
			<div class="overlay"></div>
				
			<nav class="navbar navbar-inverse" id="sidebar-wrapper" role="navigation">
				
				<ul class="nav sidebar-nav">
					<li class="sidebar-brand">
						<b><a href="{{ url('/restaurant/homepage') }}">
							RESTAURANT ET
						</b></a>
					</li>
					<li>
						<b><a href="{{ url('/restaurant/homepage') }}">HOME</a></b>
					</li>
					<li>
						<b><a href="{{ url('/restaurant/menu') }}">MENU</a></b>
					</li>
					<li>
						<b><a href="{{ url('/restaurant/about') }}">OVER ONS</a></b>
					</li>
					<li>
						<b><a href="{{ url('/restaurant/contact') }}">CONTACT</a></b>
					</li>
					
					@auth
						<li>
							<b>
								<a href="#profilelinks" data-toggle="collapse" aria-expanded="false">
									<span class="glyphicon glyphicon-list" aria-hidden="true"></span> PROFIEL
								</a>
							</b>
							
							<ul class="nav sidebar-nav collapse" style="position: relative; width: 182px;" id="profilelinks">
								<li>
									<b>
										<a href="#profilelinks" data-toggle="collapse" aria-expanded="false">
											<span class="glyphicon glyphicon-option-vertical btn-group-lg" style="display: unset;" aria-hidden="true"></span>
										</a>
									</b>
								</li>
								<li>
									<b>
										<a class="linkdropdown" href="{{ url('/profile/reservate') }}">RESERVEREN</a>
									</b>
								</li>
								<li>
									<b>
										<a class="linkdropdown" href="{{ url('/profile/reservations') }}">RESERVATIES</a>
									</b>
								</li>
								<li>
									<b>
										<a class="linkdropdown" href="{{ url('/profile/notes') }}">NOTA'S</a>
									</b>
								</li>
							</ul>
						</li>
					@endif
					
				
					@guest
						<li style="top: 45vh; display: table;">
							<b>
								<a href="{{ route('login') }}">INLOGGEN</a>
							</b>
						</li>
						<li style="top: 45vh; display: table;">
							<b>
								<a href="{{ route('register') }}">REGISTREREN</a>
							</b>
						</li>
					@else
						
					@if (Auth::user()->rank >= 0)
						<li style="top: 45vh; display: table;">
							<b>
								<a href="{{ url('/manager/index') }}">
									BEHEER
								</a>
							</b>
						</li>
						
					@endif
					
						<li class="logout_button" style="top: 45vh; display: table;">
							<b>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
									LOG UIT
								</a>
							</b>
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					@endif
				</ul>
				
			</nav>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="panel panel-default" style="width: 110%; height: 85vh;">
					@yield('content')
				</div>
			</div>
		</div>
		
	</div>
	
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>