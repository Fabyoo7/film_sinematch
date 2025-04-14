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
    <meta name="keywords" content="">
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
						<h1 class="section__title section__title--head">Catalog</h1>
						<!-- end section title -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	
	<!-- catalog -->
	<div class="section section--catalog">
		<div class="container">
			<div class="row">

				<!-- item -->
			        	@foreach($film as $item)
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="item">
								<div class="item__cover">
									<img src="{{ asset('images/film/' . $item->poster)}}" alt="">
									<a href="{{ url('detail', $item -> id ) }}" class="item__play">
										<i class="ti ti-player-play-filled"></i>
									</a>
									<span class="item__rate item__rate--green">7.1</span>
									<button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
								</div>
								<div class="item__content">
									<h3 class="item__title"><a href="{{ url('detail', $item -> id ) }}">{{ $item->judul }}</a></h3>
									<span class="item__category">
										<a href="#">{{ $item->kategori->nama_kategori}}</a>
										<a href="#">{{ $item->genre->nama_genre}}</a>
									</span>
								</div>
							</div>
						</div>
					    @endforeach
				<!-- end item -->
		</div>
	</div>
	<!-- end catalog -->
    <br>
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