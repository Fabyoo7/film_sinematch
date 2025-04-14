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
					<form action="{{ route('kategori.store') }}" method="post"  role="form" enctype="multipart/form-data" class="sign__form sign__form--add">
                         @csrf
                          @if ($errors->has('nama_kategori'))
                         <div class="alert alert-danger">
                             {{ $errors->first('nama_kategori') }}
                          </div>
                        @endif
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<div class="sign__group">
											<input type="text" class="sign__input" id="" name="nama_kategori" placeholder="Kategori" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12  d-flex justify-content gap-2">
								<button type="submit" class="sign__btn sign__btn--small">Publish</button>
								 <a href="{{ url('admin/kategori') }}" class="sign__btn sign__btn--small">Back</a>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadButton = document.querySelector('.file-upload-browse');
            const fileInput = document.querySelector('.file-upload-default');

            uploadButton.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                const fileName = fileInput.files[0] ? fileInput.files[0].name : '';
                document.querySelector('.file-upload-info').value = fileName;
            });
        });
    </script>

	</main>
	<!-- end main content -->

	<!-- JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('backend/assets/js/admin.js')}}"></script>
</body>
</html>