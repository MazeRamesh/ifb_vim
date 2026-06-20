<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>AdminLTE 3 | @yield('page-title')</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@stack('css')
	</head>
	<body class="hold-transition @yield('body-class')">

@yield('content')
	<!-- REQUIRED SCRIPTS -->
	<script src="{{ asset('js/app.js') }}" ></script>
	<!-- PAGE SPECIFIC SCRIPTS -->
@stack('scripts')
	</body>
</html>
					