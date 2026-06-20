<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>AdminLTE 3 | Starter</title>

		
		
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
			<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		
		
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">

			<!-- Navbar -->
			@include('layouts.navbar')
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			@include('layouts.sidebar')

			<!-- Content Wrapper. Contains page content -->
			@yield('content')
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			@include('layouts.footer')

		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED SCRIPTS -->
		@stack('scripts')
		<-- <script src="{{ asset('/js/app.js') }}" /> -->
		
	</body>
</html>
					