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

    @include('sweetalert::alert')

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
						<h2>GENRE</h2>

						

						<div class="main__title-wrap">
							<a href="{{ route('genre.create') }}" class="main__title-link main__title-link--wrap">Add Genre</a>
						</div>
					</div>
				</div>
				<!-- end main title -->

				<!-- items -->
				<div class="col-12">
					<div class="catalog catalog--1">
						<table class="catalog__table">
							<thead>
								<tr>
									<th>ID</th>
									<th>GENRE</th>
                                    <th>ACTIONS</th>
								</tr>
							</thead>
                             @php $no=1; @endphp
                            @foreach ($genre as $data)
							<tbody>
								<tr>
									<td>
										<div class="catalog__text">{{ $no++ }}</div>
									</td>
									<td>
										<div class="catalog__text">{{ $data->nama_genre }}</div>
									</td>
									<td>
                                         <form action="{{ route('genre.destroy', $data->id) }}"
                                             method="POST">
                                             @csrf
                                             @method('DELETE')
										<div class="catalog__btns">
											<a href="#" class="catalog__btn catalog__btn--view">
												<i class="ti ti-eye"></i>
											</a>
											<a href="{{ route('genre.edit', $data->id) }}" class="catalog__btn catalog__btn--edit">
												<i class="ti ti-edit"></i>
											</a>
											<button type="submit" data-bs-toggle="modal" class="catalog__btn catalog__btn--delete" data-bs-target="#modal-delete">
												<i class="ti ti-trash"></i>
											</button>
										</div>
									</td>
                                     </form>
								</tr>
								 @endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- end items -->
			</div>
		</div>
	</main>
	<!-- end main content -->

	<!-- status modal -->
	<div class="modal fade" id="modal-status" tabindex="-1" aria-labelledby="modal-status" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">Status change</h4>

						<p class="modal__text">Are you sure about immediately change status?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Apply</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end status modal -->

	<!-- delete modal -->
	<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal__content">
					<form action="#" class="modal__form">
						<h4 class="modal__title">Item delete</h4>

						<p class="modal__text">Are you sure to permanently delete this item?</p>

						<div class="modal__btns">
							<button class="modal__btn modal__btn--apply" type="button"><span>Delete</span></button>
							<button class="modal__btn modal__btn--dismiss" type="button" data-bs-dismiss="modal" aria-label="Close"><span>Dismiss</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end delete modal -->

	<!-- JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('backend/assets/js/admin.js')}}"></script>
</body>
</html>