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
	<link rel="stylesheet" href="{{ asset('frontend/assets/webfont/tabler-icons.min.css') }}">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('frontend/assets/icon/favicon-32x32.png') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('frontend/assets/icon/favicon-32x32.png') }}">

	<meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
	<meta name="author" content="Dmitry Volkov">
	<title>SINEMATCH</title>
</head>

<body>
	<!-- Header -->
	@include('include.frontend.header')

	<!-- Page Title -->
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

	<!-- Content -->
	<div class="content">
		<!-- Profile -->
		<div class="profile">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="profile__content">
							<div class="profile__user">
								<div class="profile__avatar">
									<img src="{{ Auth::user()->avatar ?? asset('frontend/assets/img/user.svg') }}" alt="User Avatar">
								</div>
								<div class="profile__meta">
									<h3>{{ Auth::user()->name }}</h3>
									<span>SINEMATCH ID: {{ Auth::user()->id }}</span>
								</div>
							</div>

							<!-- Tab Nav -->
							<ul class="nav nav-tabs content__tabs content__tabs--profile" id="content__tabs" role="tablist">
								<li class="nav-item" role="presentation">
									<button id="1-tab" class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Profile</button>
								</li>
								<li class="nav-item" role="presentation">
									<button id="3-tab" data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab" aria-controls="tab-3" aria-selected="false">Favorites</button>
								</li>
							</ul>

							<!-- Logout -->
							<button class="profile__logout" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="ti ti-logout"></i>
								<span>Logout</span>
							</button>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							<!-- End Logout -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tabs Content -->
		<div class="container">
			<div class="tab-content">
				<!-- Profile Tab -->
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab" tabindex="0">
					<div class="row">
						@php
							// Example placeholder values
							$stats = [
								['label' => 'Premium plan', 'value' => '$34.99 / month', 'icon' => 'ti-credit-card'],
								['label' => 'Films watched', 'value' => '1 678', 'icon' => 'ti-movie'],
								['label' => 'Your comments', 'value' => '2 573', 'icon' => 'ti-message-circle'],
								['label' => 'Your reviews', 'value' => '1 021', 'icon' => 'ti-star-half-filled'],
							];
						@endphp

						@foreach($stats as $stat)
						<div class="col-12 col-md-6 col-xl-3">
							<div class="stats">
								<span>{{ $stat['label'] }}</span>
								<p>{{ $stat['value'] }}</p>
								<i class="ti {{ $stat['icon'] }}"></i>
							</div>
						</div>
						@endforeach
					</div>

					<div class="row">
						<!-- Movies for you -->
						<div class="col-12 col-xl-6">
							<div class="dashbox">
								<div class="dashbox__title">
									<h3><i class="ti ti-movie"></i> Movies for you</h3>
									<div class="dashbox__wrap">
										<a class="dashbox__refresh" href="#"><i class="ti ti-refresh"></i></a>
										<a class="dashbox__more" href="catalog.html">View All</a>
									</div>
								</div>
								<div class="dashbox__table-wrap dashbox__table-wrap--1">
									<table class="dashbox__table">
										<thead>
											<tr>
												<th>ID</th>
												<th>TITLE</th>
												<th>CATEGORY</th>
												<th>RATING</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="dashbox__table-text dashbox__table-text--grey">241</div></td>
												<td><div class="dashbox__table-text"><a href="details.html">The Lost City</a></div></td>
												<td><div class="dashbox__table-text">Movie</div></td>
												<td><div class="dashbox__table-text dashbox__table-text--rate"><i class="ti ti-star"></i> 9.2</div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- Latest Reviews -->
						<div class="col-12 col-xl-6">
							<div class="dashbox">
								<div class="dashbox__title">
									<h3><i class="ti ti-star-half-filled"></i> Latest reviews</h3>
									<div class="dashbox__wrap">
										<a class="dashbox__refresh" href="#"><i class="ti ti-refresh"></i></a>
										<a class="dashbox__more" href="#">View All</a>
									</div>
								</div>
								<div class="dashbox__table-wrap dashbox__table-wrap--2">
									<table class="dashbox__table">
										<thead>
											<tr>
												<th>ID</th>
												<th>ITEM</th>
												<th>AUTHOR</th>
												<th>RATING</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="dashbox__table-text dashbox__table-text--grey">824</div></td>
												<td><div class="dashbox__table-text"><a href="details.html">I Dream in Another Language</a></div></td>
												<td><div class="dashbox__table-text">Eliza Josceline</div></td>
												<td><div class="dashbox__table-text dashbox__table-text--rate"><i class="ti ti-star"></i> 7.2</div></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Favorites Tab -->
				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab" tabindex="0">
					<div class="row">
						@foreach(Auth::user()->favorites as $film)
							<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
								<div class="item">
									<div class="item__cover">
										<img src="{{ asset('images/film/' . $film->poster) }}" alt="">
										<a href="{{ url('detail', $film->id) }}" class="item__play">
											<i class="ti ti-player-play-filled"></i>
										</a>
										<span class="item__rate item__rate--green">7.1</span>
										<button class="item__favorite item__favorite--active" type="button" onclick="toggleFavorite({{ $film->id }}, this)">
											<i class="ti ti-bookmark"></i>
										</button>
									</div>
									<div class="item__content">
										<h3 class="item__title"><a href="{{ url('detail', $film->id) }}">{{ $film->judul }}</a></h3>
										<span class="item__category">
											<a href="#">{{ $film->kategori->nama_kategori }}</a>
											<a href="#">{{ $film->genre->nama_genre }}</a>
										</span>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	@include('include.frontend.footer')

	<!-- Scripts -->
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
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/splide.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/slimselect.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/smooth-scrollbar.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/plyr.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/photoswipe.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/photoswipe-ui-default.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>
</html>
