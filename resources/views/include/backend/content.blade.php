<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Total Kategori</span>
						<!-- or .red -->
						<p>{{$total_kategori}}</p>
						<i class="ti ti-list"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Total Genre</span>
						<p>{{$total_genre}}</p>
						<i class="ti ti-book"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Total FILM</span>
						<p>{{$total_film}}</p>
						<i class="ti ti-movie"></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-xl-3">
					<div class="stats">
						<span>Total Review</span>
						<p>{{$total_review}}</p>
						<i class="ti ti-star-half-filled"></i>
					</div>
				</div>
				<!-- end stats -->
			</div>

			<div class="row">
				<!-- dashbox -->
			
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="ti ti-movie"></i> Latest Film</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__more" href="{{ route('film.index') }}">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--2">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>CATEGORY</th>
										<th>GENRE</th>
									</tr>
								</thead>
							@php $no=1; @endphp
                            @foreach ($film->sortByDesc('created_at')->take(5) as $data)
								<tbody>
									<tr>
										<td>
											<div class="dashbox__table-text dashbox__table-text--grey">{{ $no++ }}</div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ Str::limit($data->judul, 25) }}</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ $data->kategori->nama_kategori }}</div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ $data->genre->nama_genre }}</div>
										</td>
									</tr>
									@endforeach
								</tbody>				
							</table>
						</div>
					</div>
				</div>
				
				<!-- end dashbox -->

				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class="ti ti-star-half-filled"></i> Latest reviews</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__refresh" href="#"></a>
								<a class="dashbox__more" href="{{ route('review.index') }}">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap dashbox__table-wrap--4">
							<table class="dashbox__table">
								<thead>
									<tr>
										<th>ID</th>
										<th>ITEM</th>
										<th>AUTHOR</th>
										<th>RATING</th>
									</tr>
								</thead>

								@php $no=1; @endphp
                            @foreach ($review->sortByDesc('created_at')->take(5) as $data)
								<tbody>
									<tr>
										<td>
											<div class="dashbox__table-text dashbox__table-text--grey">{{ $no++ }}</div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ $data->film->judul }}</a></div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ $data->user->name }}</div>
										</td>
										<td>
											<div class="dashbox__table-text">{{ $data->rating }}</div>
										</td>
									</tr>
									@endforeach
								</tbody>				
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->
			</div>
		</div>
	</main>