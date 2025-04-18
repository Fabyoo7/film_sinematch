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
						<h1 class="section__title section__title--head">Privacy policy</h1>
						<!-- end section title -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- privacy -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section text -->
				<div class="col-12">
					<p class="section__text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

					<p class="section__text">Many desktop publishing packages and <a href="#">web page</a> editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

					<p class="section__text">All the Lorem Ipsum generators on the <b>Internet</b> tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
				</div>
				<!-- end section text -->

				<!-- section list -->
				<div class="col-12">
					<div class="section__list">
						<ol>
							<li>
								<h4>Determination of personal information of users</h4>
								<ol>
									<li>If you are going to use a passage of Lorem Ipsum:
										<ol>
											<li>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</li>
											<li>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</li>
										</ol>
									</li>
									<li>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</li>
									<li>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</li>
								</ol>
							</li>

							<li>
								<h4>Reasons for collecting and processing user personal information</h4>
								<ol>
									<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</li>
									<li>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet:
										<ol>
											<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged;</li>
											<li>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages;</li>
											<li>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like);</li>
											<li>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text;</li>
										</ol>
									</li>
								</ol>
							</li>
						</ol>
					</div>
				</div>
				<!-- end section list -->
			</div>
		</div>
	</section>
	<!-- end privacy -->

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