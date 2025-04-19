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

    @include('sweetalert::alert')

    <div class="container-scroller">
        {{-- SIDEBAR --}}
        @include('include.backend.sidebar')

        {{-- NAVBAR --}}
        main
        <main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Detail FILM</h2>
					</div>
				</div>
                        <div class="col-12">
                            <form method="GET" action="{{ route('film.show',$film->id) }}" role="form" enctype="multipart/form-data" class="sign__form sign__form--add">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="sign__group">
                                            
                                            <input type="text" class="sign__input" id="judul" name="judul" placeholder="Title" value="{{ $film->judul }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <select class="sign__input" name="id_kategori" id="kategori" disabled>
                                                @foreach ($kategori as $data)
                                                    <option value="{{ $data->id }}" {{ $data->id == $film->id_kategori ? 'selected' : '' }}>{{ $data->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <select class="sign__input" name="id_genre" id="genre" disabled>
                                                @foreach ($genre as $data)
                                                    <option value="{{ $data->id }}" {{ $data->id == $film->id_genre ? 'selected' : '' }}>{{ $data->nama_genre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" id="waktu" name="waktu" value="{{ $film->waktu }}" disabled placeholder="WAKTU">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="sign__group">
                                            <input type="date" name="tahun_rilis" id="tahun_rilis" class="sign__input" value="{{ $film->tahun_rilis }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" id="aktor" name="aktor" value="{{ $film->aktor }}" disabled placeholder="AKTOR">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <input type="text" class="sign__input" id="rating" name="rating" value="{{ $film->rating }}" disabled placeholder="RATING">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <textarea class="sign__textarea" name="sipnosis" id="sipnosis" rows="4" disabled placeholder="Description">{{ $film->sipnosis }}</textarea>
                                        </div>
                                    </div>

                                        <div class="col-12">
                                        <div class="sign__group">
                                            <div class="sign__gallery" style="width: 300px; height: 400px; margin: 0 auto;">
                                                <img id="poster_preview" src="{{ asset('images/film/' . $film->poster) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content gap-2">
                                        <a href="{{ url('admin/film') }}" class="sign__btn sign__btn--small">Back</a>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <!-- JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
    <script src="{{ asset('backend/assets/js/admin.js')}}"></script>

</body>
</html>
