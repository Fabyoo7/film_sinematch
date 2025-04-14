<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/splide.min.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/slimselect.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/default-skin.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}">

	<!-- Icon font -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/webfont/tabler-icons.min.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ asset('frontend/assets/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('frontend/assets/icon/favicon-32x32.png')}}">

	<meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
	<meta name="author" content="Dmitry Volkov">
	<title>SINEMATCH</title>
</head>

<body>
	<!-- header -->
	@include('include.frontend.header')
	<!-- end header -->

	<!-- page title -->
	<section class="section section--first">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<h1 class="section__title section__title--head">Profile</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- profile -->
	<div class="profile">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="profile__content">
						<div class="profile__user">
							<div class="profile__avatar">
								<img src="{{ Auth::user()->avatar ??  asset('frontend/assets/img/user.svg') }}" alt="User Avatar">
							</div>
							<div class="profile__meta">
								<h3>{{ Auth::user()->name }}</h3>
								<span>SINEMATCH ID: {{ Auth::user()->id }}</span>
							</div>
						</div>
						<button class="profile__logout" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="ti ti-logout"></i>
							<span>Logout</span>
						</button>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end profile -->

	

	<!-- JS -->
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
