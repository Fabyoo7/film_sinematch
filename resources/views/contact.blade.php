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
						<!-- section title -->
						<h1 class="section__title section__title--head">Contacts</h1>
						<!-- end section title -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- contacts -->
	<section class="section">
		<div class="container">
			<div class="row">
				</div>
				
				<div class="col-12">
					<div class="row">
						<!-- contacts -->
						<div class="col-12">
							<h2 class="section__title section__title--mt">Get In Touch</h2>

							<p class="section__text">We are always happy to help and provide more information about our services. You can contact us through email, phone, or by filling out the form on our website. Thank you for considering us!</p>

							<ul class="contacts__list">
								<li><a href="tel:+18002345678">+62 82219572405</a></li>
								<li><a href="mailto:support@hotflix.com">sinematch@gmail.com</a></li>
							</ul>

							<div class="contacts__social">
								<a href="https://www.facebook.com/fabio.naufal.3"><i class="ti ti-brand-facebook"></i></a>
								<a href="#"><i class="ti ti-brand-x"></i></a>
								<a href="https://www.instagram.com/fabionfl7/" target="_blank"><i class="ti ti-brand-instagram"></i></a>
								<a href="#"><i class="ti ti-brand-discord"></i></a>
								<a href="#"><i class="ti ti-brand-telegram"></i></a>
								<a href="#"><i class="ti ti-brand-tiktok"></i></a>
							</div>
						</div>
						<!-- end contacts -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end contacts -->

	<!-- footer -->
	@include('include.frontend.footer')
	<!-- end footer -->

	<!-- JS -->
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/splide.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/plyr.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/photoswipe.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/photoswipe-ui-default.min.js')}}"></script>
	<script src="{{ asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>