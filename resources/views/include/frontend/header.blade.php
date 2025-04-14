<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="/" class="header__logo">
							<img src="{{ asset('frontend/assets/img/logo111.png')}}" alt=""style="width: 220px; height: auto; margin-left: 15px;">
						</a>
						<!-- end header logo -->

						<!-- header nav -->
						<ul class="header__nav">
							 <!-- Home -->
							<li class="header__nav-item">
								<a href="{{ Auth::check() ? route('user.home') : '/' }}" class="header__nav-link" >Home</a>
							</li>

							<!-- Catalog -->
							<li class="header__nav-item">
								<a href="{{ Auth::check() ? route('user.catalog') : route('catalog') }}" class="header__nav-link">Catalog</a>
							</li>

							<!-- About Us -->
							<li class="header__nav-item">
								<a href="{{ Auth::check() ? route('user.about') : route('about') }}" class="header__nav-link">About us</a>
							</li>
						</ul>
						
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
							<form action="#" class="header__search">
								<input class="header__search-input" type="text" placeholder="Search...">
								<button class="header__search-button" type="button">
									<i class="ti ti-search"></i>
								</button>
								<button class="header__search-close" type="button">
									<i class="ti ti-x"></i>
								</button>
							</form>

							<button class="header__search-btn" type="button">
								<i class="ti ti-search"></i>
							</button>


							<!-- dropdown -->
							<div class="header__profile">
								@guest
									<!-- Jika belum login, tampilkan tombol LOGIN -->
									<a class="header__sign-in header__sign-in--user" href="{{ route('login') }}" role="button">
										<i class="ti ti-user"></i>
										<span>LOGIN</span>
									</a>
								@else
									<!-- Jika sudah login, ubah menjadi link ke halaman profil -->
									<a class="header__sign-in header__sign-in--user" href="profile" role="button">
										<i class="ti ti-user"></i>
										<span>Profile</span>
									</a>
								@endguest
							</div>
							<!-- end dropdown -->
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
