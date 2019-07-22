<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ config('app.name') }}</title>

		<!-- Bootstrap -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" integrity="sha256-3iu9jgsy9TpTwXKb7bNQzqWekRX7pPK+2OLj3R922fo=" crossorigin="anonymous" />

		<!-- AdminLTE -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/css/AdminLTE.css" integrity="sha256-j3iHWqU+/mbeEPIRlLxEznQaRP8HGkzCnNhb+myNRv8=" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/css/skins/skin-blue.min.css" integrity="sha256-dDi4GN+hJjMVQmkbeVpXkn3/qwQrL3oWvW8ukATCaPc=" crossorigin="anonymous" />

		<!-- HightCharts -->
		<!--
		<script src="https://code.highcharts.com/highcharts.js"></script>
		-->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body class="hold-transition skin-blue @yield('colapsado') sidebar-mini">

		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

				<!-- Logo -->
				<a href="{{ url('/') }}" class="logo">
					<span class="logo-mini">RCP</span>
					@yield('logo')
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">

					<!-- Botón de minimizar -->
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<!-- Navbar Right Menu -->
{{--					<div class="navbar-custom-menu">--}}
{{--						<ul class="nav navbar-nav">--}}
{{--							<!-- Menu de Usuario -->--}}
{{--							@guest--}}
{{--								<li><a href="{{ route('login') }}">Login</a></li>--}}
{{--								<li><a href="{{ route('register') }}">Register</a></li>--}}
{{--							@else--}}
{{--								<li class="dropdown">--}}
{{--									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
{{--										{{ Auth::user()->first_name }} <span class="caret"></span>--}}
{{--									</a>--}}
{{--									<ul class="dropdown-menu">--}}
{{--										<li>--}}
{{--											<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>--}}
{{--											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>--}}
{{--										</li>--}}
{{--									</ul>--}}
{{--								</li>--}}
{{--							@endguest--}}

{{--							<!-- Botón de configuración -->--}}
{{--							<li>--}}
{{--								<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
{{--							</li>--}}

{{--						</ul>--}}
{{--					</div>--}}
				</nav>
			</header>

			<!-- Columna izquierda -->
			<aside class="main-sidebar">
				<section class="sidebar">
{{--				@auth--}}
{{--					<!-- Menu -->--}}
{{--					<ul class="sidebar-menu" data-widget="tree">--}}
{{--						<div class="user-panel">--}}
{{--							<div class="pull-left image">--}}
{{--								<img src="https://sim.mercosur.int/img/mercosur_160.png" class="img-circle" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"/>--}}
{{--							</div>--}}
{{--							<div class="pull-left info">--}}
{{--								<p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->first_name }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>--}}
{{--								<a href="#"><i class="fa fa-circle text-success"></i> {{ trans('layout.linea') }}</a>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--						<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i><span>{{ trans('layout.inicio') }}</span></a></li>--}}
{{--						<li class="treeview">--}}
{{--							<a href="#"><i class="fa fa-table"></i> <span>{{ trans('equivalencias.menu') }}</span>--}}
{{--								<span class="pull-right-container">--}}
{{--									<i class="fa fa-angle-left pull-right"></i>--}}
{{--								</span>--}}
{{--							</a>--}}
{{--							<ul class="treeview-menu">--}}
{{--								<li><a href="/tabla/1">NCM 07/2004</a></li>--}}
{{--							</ul>--}}
{{--						</li>--}}
{{--					</ul>--}}
{{--				@endauth--}}
				</section>
			</aside>
			

			<!-- Sección principal -->
			<div class="content-wrapper">
{{--				@auth--}}
				<section class="content-header">
					@yield('encabezado')
					@yield('breadcrumb')
				</section>

				<!-- contenido principal -->
				<section class="content container-fluid">
					@yield('contenido')
				</section>
{{--				@endauth--}}
			</div>

			<!-- Pie de página -->
			<footer class="main-footer">
				<div class="pull-right hidden-xs">

				</div>
				{{ trans('layout.desarrollador') }} <a href="http://www.mercosur.int/" target="_blank">{{ trans('layout.secretaria') }}</a>
			</footer>

			<div class="control-sidebar-bg"></div>

		</div>
	</body>

	<!-- jQuery 3 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
	<!-- AdminLTE App -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.10/js/adminlte.min.js" integrity="sha256-EQdVhGZHXaz1JDzRk5iIxsVRXH3yddtfMaii5tTK1uY=" crossorigin="anonymous"></script>

	</body>
</html>