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
	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form method="POST" action="{{ route('login') }}" class="sign__form">
            			   @csrf
							<a href="index.html" class="sign__logo">
								<img src="{{ asset('backend/assets/img/logo111.png') }}" alt="" style="width: 210px; height: auto; margin-left: -7px;">
							</a>

							<div class="sign__group">
								<input id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
							</div>

							<div class="sign__group">
								<input id="password" type="password" class="sign__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div>

							<button class="sign__btn" type="submit">Sign in</button>

							<span class="sign__delimiter">or</span>


							<span class="sign__text">Don't have an account? <a href="register">Sign up!</a></span>

							<span class="sign__text"><a href="forgot.html">Forgot password?</a></span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/slimselect.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/smooth-scrollbar.js')}}"></script>
	<script src="{{ asset('backend/assets/js/admin.js')}}"></script>
</body>
</html>