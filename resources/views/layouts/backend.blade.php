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
	@include('include.backend.header')
	<!-- end header -->

	<!-- sidebar -->
  @include('include.backend.sidebar')
  <!-- end sidebar -->

	<!-- main content -->
	@include('include.backend.content')
	<!-- end main content -->

	<!-- JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('backend/assets/js/admin.js')}}"></script>
</body>
</html>