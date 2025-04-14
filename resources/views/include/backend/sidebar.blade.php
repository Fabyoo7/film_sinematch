<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.html" class="sidebar__logo">
			<img src="{{ asset('backend/assets/img/logo111.png') }}" alt="" style="width: 210px; height: auto; margin-left: -7px;">
            <br>
		</a>
		<!-- end sidebar logo -->

		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="{{ asset('backend/assets/img/user.svg') }}" alt="">
			</div>

			<div class="sidebar__user-title">
				<p>Admin</p>
			</div>

			<a class="sidebar__user-btn" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="submit">
				<i class="ti ti-logout"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                </form>
			</a>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="{{ route('home') }}" class="sidebar__nav-link sidebar__nav-link"><i class="ti ti-layout-grid"></i> <span>Dashboard</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{ route('review.index') }}" class="sidebar__nav-link"><i class="ti ti-star-half-filled"></i> <span>Reviews</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{ route('kategori.index') }}" class="sidebar__nav-link"><i class="ti ti-list"></i> <span>KATEGORI</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{ route('genre.index') }}" class="sidebar__nav-link"><i class="ti ti-book"></i> <span>GENRE</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="{{ route('film.index') }}" class="sidebar__nav-link"><i class="ti ti-movie"></i> <span>FILM</span></a>
				</li>

				<!-- dropdown -->
				<!-- end dropdown -->
				<li class="sidebar__nav-item">
					<a href="/" class="sidebar__nav-link"><i class="ti ti-arrow-left"></i> <span>Back to HotFlix</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->


	</div>
	<!-- end sidebar -->
