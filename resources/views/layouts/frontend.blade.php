<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/splide.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/slimselect.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/photoswipe.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/default-skin.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

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

	<!-- home -->
	<section class="home">
		<div class="container">
			<div class="row">
				<!-- home title -->
				<div class="col-12">
					<h1 class="home__title"><b>NEW ITEMS</b> OF THIS SEASON</h1>
				</div>
				<!-- end home title -->

				<!-- home carousel -->
				<div class="col-12">
					<div class="home__carousel splide splide--home">
						<div class="splide__arrows">
							<button class="splide__arrow splide__arrow--prev" type="button">
								<i class="ti ti-chevron-left"></i>
							</button>
							<button class="splide__arrow splide__arrow--next" type="button">
								<i class="ti ti-chevron-right"></i>
							</button>
						</div>

						<div class="splide__track">
							<ul class="splide__list">
								
								@foreach($film as $item)
								<li class="splide__slide">
										<div class="item item--hero">
											<div class="item__cover">
												<img src="{{ asset('images/film/' . $item->poster) }}" alt="">
												
												<!-- Link ke detail film, berubah berdasarkan status login -->
												<a href="{{ Auth::check() ? url('user/detail', $item->id) : url('detail', $item->id) }}" class="item__play">
													<i class="ti ti-player-play-filled"></i>
												</a>
												 @php
													$rating = $item->rating;
													$ratingClass = 'item__rate--red';

													if ($rating >= 8) {
														$ratingClass = 'item__rate--green';
													} elseif ($rating >= 7) {
														$ratingClass = 'item__rate--yellow';
													}
												@endphp

												<span class="item__rate {{ $ratingClass }}">{{ $rating }}</span>
												<button class="item__favorite" type="button" onclick="toggleFavorite({{ $item->id }}, this)">
														<i class="ti ti-bookmark"></i>
												</button>

											</div>

											<div class="item__content">
												<h3 class="item__title">
													<a href="{{ Auth::check() ? url('user/detail', $item->id) : url('detail', $item->id) }}">{{ $item->judul }}</a>
												</h3>
												<span class="item__category">
													<a href="#">{{ $item->kategori->nama_kategori }}</a>
													<a href="#">{{ $item->genre->nama_genre }}</a>
												</span>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- end home carousel -->
			</div>
		</div>
	</section>
	<!-- end home -->
	
	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Recently updated</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<button id="1-tab" class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">All ITEMS</button>
							</li>
						</ul>
						<!-- end content tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab" tabindex="0">
					<div class="row">
						<!-- item -->
						 
						@foreach($film->sortByDesc('created_at')->take(18) as $item)
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="item">
								<div class="item__cover">
									<img src="{{ asset('images/film/' . $item->poster)}}" alt="">
									<a href="{{ Auth::check() ? url('user/detail', $item->id) : url('detail', $item->id) }}" class="item__play">
										<i class="ti ti-player-play-filled"></i>
									</a>
									@php
                                        $rating = $item->rating;
                                        $ratingClass = 'item__rate--red';

                                        if ($rating >= 8) {
                                            $ratingClass = 'item__rate--green';
                                        } elseif ($rating >= 7) {
                                            $ratingClass = 'item__rate--yellow';
                                        }
                                    @endphp

                                    <span class="item__rate {{ $ratingClass }}">{{ $rating }}</span>
									<button class="item__favorite" type="button" onclick="toggleFavorite({{ $item->id }}, this)">
										<i class="ti ti-bookmark"></i>
									</button>

								</div>
								<div class="item__content">
									<h3 class="item__title"><a href="{{ Auth::check() ? url('user/detail', $item->id) : url('detail', $item->id) }}">{{ $item->judul }}</a></h3>
									<span class="item__category">
										<a href="#">{{ $item->kategori->nama_kategori}}</a>
										<a href="#">{{ $item->genre->nama_genre}}</a>
									</span>
								</div>
							</div>
						</div>
						@endforeach
						@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					
						<!-- end item -->
					</div>
				</div>
			</div>
			<!-- end content tabs -->

			<div class="row">
				<!-- more -->
				<div class="col-12">
					<a class="section__more" href="{{ Auth::check() ? route('user.catalog') : route('catalog') }}">View all</a>
				</div>
				<!-- end more -->
			</div>
		</div>
	</section>
	<!-- end content -->

	<!-- footer -->
	@include('include.frontend.footer')
	<!-- end footer -->

	<script>
    function toggleFavorite(filmId, btn) {
        fetch(`/favorite/${filmId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'added') {
                btn.classList.add('item__favorite--active');
            } else {
                btn.classList.remove('item__favorite--active');
            }
        })
        .catch(err => console.error('Favorite toggle error:', err));
    }
</script>

	

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