
<nav class="main-header navbar navbar-expand bg-nav navbar-light elevation-2 fixed-top">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			@php
			$companyDetails = DB::table('companies')->first();
			@endphp
			<a href="http://www.mhi-ipt.in/" target="_blank" class="nav-link" style="font-size: 16px; font-weight: bold;">{{config('app.company_name')}}</a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
		@if (Route::has('register'))
			<li class="nav-item">
				<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			</li>
		@endif
		@else
		<li class="nav-item dropdown">
			<!-- <div class="row"> -->
				<!-- <i class="fas fa-sign-out-alt"></i> -->
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i>
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>
		<!-- </div> -->
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
		@endguest
	</ul>
</nav>

