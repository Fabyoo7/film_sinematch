<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/assets/css/slimselect.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/assets/css/admin.css')}}">

	<!-- Icon font -->
	<link rel="stylesheet" href="{{ asset('backend/assets/webfont/tabler-icons.min.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ asset('backend/assets/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('backend/assets/icon/favicon-32x32.png')}}">

	<meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>SINEMATCH</title>
</head>


<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.html" class="header__logo">
				<img src="img/logo.svg" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- sidebar -->
	@include('include.backend.sidebar')
	<!-- end sidebar -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Add new item</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="{{ route('film.store') }}" method="post"  role="form" enctype="multipart/form-data" class="sign__form sign__form--add">
                         @csrf
						<div class="row">
							<div class="col-12">
								<div class="sign__group" >
									<input type="text" class="sign__input" id="searchTitle" placeholder="Cari Judul Film">
									<button type="button" class="sign__btn sign__btn--small" id="btnSearchTMDB">Search</button>
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<div class="sign__group">
											<input type="text" class="sign__input" id="judul" name="judul" placeholder="Title">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 ">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="sign__group">
                                             <select class="sign__input" name="id_kategori" id="kategori"
                                                id="exampleSelectGender">
                                                <option value="" selected>Pilih Kategori</option>

                                                @foreach ($kategori as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
										</div>
									</div>
                                    

									<div class="col-12 col-md-6">
										<div class="sign__group">
											<select class="sign__input" name="id_genre" id="genre"
                                                id="exampleSelectGender">
                                                <option value="" selected>Pilih Genre</option>

                                                @foreach ($genre as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_genre }}
                                                    </option>
                                                @endforeach
                                            </select>

										</div>
									</div>

									<div class="col-12 col-md-6">
										<div class="sign__group">
											<input type="text" class="sign__input" id="waktu" name="waktu" placeholder="WAKTU">
										</div>
									</div>


									<div class="col-12 col-md-6">
										<div class="sign__group">
											<input type="date" name="tahun_rilis" id="tahun_rilis" class="sign__input" placeholder="TAHUN RILIS">
										</div>
									</div>		

                                    <div class="col-12 ">
										<div class="sign__group">
											<input type="text" class="sign__input" id="aktor" name="aktor" placeholder="AKTOR">
										</div>
									</div>
                                    
                                    <div class="col-12">
										<div class="sign__group">
											<textarea name="sipnosis" id="sipnosis" class="sign__textarea" placeholder="Description"></textarea>
										</div>
									</div>

                                    <div class="col-12">
										<div class="sign__group">
											<div class="sign__gallery">
												<label id="gallery1" for="sign__gallery-upload">Upload Poster (240x340)</label>
												<input data-name="#gallery1" id="sign__gallery-upload" name="poster" class="sign__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple="">
												<input type="hidden" id="poster_url" name="poster_url">
												<!-- Tambahkan di tempat yang cocok -->
												<img id="poster_preview" src="" style="display:none; max-width: 200px; margin-top: 10px;">
											</div>
										</div>
									</div>

								</div>
							</div>

							<div class="col-12 ">
									<div class="sign__group">
							    	<input type="text" class="sign__input" id="trailer" name="trailer" placeholder="TRAILER">
								</div>
							</div>
							<div class="col-12  d-flex justify-content gap-2">
								<button type="submit" class="sign__btn sign__btn--small">Publish</button>
								 <a href="{{ url('admin/film') }}" class="sign__btn sign__btn--small">Back</a>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			document.getElementById('btnSearchTMDB').addEventListener('click', function () {
				console.log("Button clicked");

				const query = document.getElementById('searchTitle').value;
				const apiKey = 'baaa37583292e10f8694ea5ad6323027';

				fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${encodeURIComponent(query)}`)
					.then(res => res.json())
					.then(data => {
						console.log(data);

						if (data.results.length > 0) {
							const movie = data.results[0];
							console.log("movie.poster_path:", movie.poster_path);

							// Isi input judul dan sipnosis
							document.getElementById('judul').value = movie.title || '';
							document.getElementById('sipnosis').value = movie.overview || '';
							document.getElementById('tahun_rilis').value = movie.release_date || '';

							// Ambil poster path dan buat URL
							if (movie.poster_path) {
								const fullPosterUrl = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
								console.log("Poster URL:", fullPosterUrl);

								// Tampilkan preview poster
								const posterEl = document.getElementById('poster_preview');
								if (posterEl) {
									console.log("Poster El:", posterEl);
									posterEl.src = fullPosterUrl;
									posterEl.style.display = 'block';
								}

								// Simpan URL ke input tersembunyi
								const posterInput = document.getElementById('poster_url');
								if (posterInput) {
									console.log("Poster Input:", posterInput);
									posterInput.value = fullPosterUrl;
								}
							} else {
								console.log("Poster path kosong");
							}

							// Fetch detail movie: runtime, credits, videos
							fetch(`https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&append_to_response=videos,credits`)
								.then(res => res.json())
								.then(detail => {
									console.log(detail);

									// Waktu tayang / durasi
									document.getElementById('waktu').value = detail.runtime ? detail.runtime + " menit" : '';

									// Aktor
									const cast = detail.credits.cast.slice(0, 3).map(a => a.name).join(', ');
									document.getElementById('aktor').value = cast || '';

									// Trailer YouTube
									const trailer = detail.videos.results.find(v => v.type === 'Trailer' && v.site === 'YouTube');
									if (trailer) {
										document.getElementById('trailer').value = `https://www.youtube.com/watch?v=${trailer.key}`;
									}
								});
						} else {
							alert('Film tidak ditemukan.');
						}
					})
					.catch(err => {
						console.error('Error fetching from TMDB:', err);
						alert('Gagal mengambil data dari TMDB.');
					});
			});
		});
</script>




	<!-- JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('backend/assets/js/admin.js')}}"></script>
</body>
</html>