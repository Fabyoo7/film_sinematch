<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slimselect.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/photoswipe.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/default-skin.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}">

    <!-- Icon font -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/webfont/tabler-icons.min.css')}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/icon/favicon-32x32.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/icon/favicon-32x32.png')}}">

    <meta name="description" content="Online Movies, TV Shows & Cinema HTML Template">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>SINEMATCH</title>
</head>

<body>
    <!-- header -->
    @include('include.frontend.header')
    <!-- end header -->

    <!-- details -->
    <section class="section section--details">
        <!-- details content -->
        <div class="container">
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="section__title section__title--head">{{$film->judul}}</h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-6">
                    <div class="item item--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-6 col-xxl-5">
                                <div class="item__cover">
                                    <img src="{{ asset('images/film/' . $film->poster)}}" alt="">
                                     @php
                                        $rating = $film->rating;
                                        $ratingClass = 'item__rate--red';

                                        if ($rating >= 8) {
                                            $ratingClass = 'item__rate--green';
                                        } elseif ($rating >= 7) {
                                            $ratingClass = 'item__rate--yellow';
                                        }
                                    @endphp

                                    <span class="item__rate {{ $ratingClass }}">{{ $rating }}</span>
                                    <button class="item__favorite item__favorite--static" type="button"><i class="ti ti-bookmark"></i></button>
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-md-7 col-lg-8 col-xl-6 col-xxl-7">
                                <div class="item__content">
                                    <ul class="item__meta">
                                        <li><span>Aktor:        <a href="">{{$film->aktor}}</a></span></li>
                                        <li><span>Kategori:</span><a href="">{{ $film->kategori->nama_kategori}}</a> </li>
                                        <li><span>Genre:</span> <a href="">{{ $film->genre->nama_genre}}</a>
                                        <li><span>Tahun rilis:  <span>{{ \Carbon\Carbon::parse($film->tahun_rilis)->locale('id')->translatedFormat('d F Y')}}</span>
                                        <li><span>Waktu:</span>{{$film->waktu}}</li>
                                        <li><span>Sipnosis:</span> <a>{{$film->sipnosis}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <!-- player -->
                <div class="col-12 col-xl-6">
                    <br>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/{{ Str::between($film->trailer, 'v=', '&') ?? Str::afterLast($film->trailer, 'v=') }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                <!-- end player -->
            </div>
        </div>
        <!-- end details content -->
    </section>
    <!-- end details -->

    <!-- content -->
    <section class="content">
        <div class="content__head content__head--mt">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Discover</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button id="1-tab" class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Reviews</button>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- content tabs -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab" tabindex="0">
                            <div class="row">
                                <!-- review -->
                                <div class="col-12">
                                    <div class="reviews">
                                        <ul class="reviews__list">
                                            @foreach($review as $komentar)
                                            <li class="reviews__item">
                                                <div class="reviews__autor">
                                                    <img class="reviews__avatar" src="{{ asset('frontend/assets/img/user.svg')}}" alt="">
                                                    <span class="reviews__name">{{ $komentar->user->name }}</span>
                                                    <span class="reviews__time">{{ $komentar->created_at->setTimezone('Asia/Jakarta')->format('d.m.Y, H:i') }}</span>
                                                    <span class="reviews__rating reviews__rating--yellow">{{ $komentar->rating }}</span>
                                                </div>
                                                <p class="reviews__text">{{ $komentar->komen }}</p>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <!-- form komentar -->
                                       <form action="{{ route('review.store') }}" class="sign__form sign__form--comments" method="POST"
                                        role="form" enctype="multipart/form-data">
                                            @csrf
                                        @auth
                                            <form action="{{ route('review.store') }}" class="sign__form sign__form--comments" method="POST" role="form" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="id_user" id="id_user" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="id_film" value="{{ $film->id }}">

                                                <div class="sign__group">
                                                    <select class="sign__select" name="rating" id="rating">
                                                        <option value="0">Rating</option>
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}">{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="sign__group">
                                                    <textarea id="komen" name="komen" class="sign__textarea" placeholder="Add review"></textarea>
                                                </div>

                                                <button type="submit" class="sign__btn sign__btn--small">Send</button>
                                            </form>
                                        @else
                                            <p class="text-white">
                                                Silakan <a href="{{ route('login') }}" class="text-warning text-decoration-underline">login</a> untuk memberikan Review dan Rating.
                                            </p>
                                        @endauth

                                        </form> 
                                        <!-- end form komentar -->
                                    </div>
                                </div>
                                <!-- end review -->
                            </div>
                        </div>
                    </div>
                    <!-- end content tabs -->
                </div>

                <!-- sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <!-- section title -->
                        <div class="col-12">
                            <h2 class="section__title section__title--sidebar">You may also like...</h2>
                        </div>
                        <!-- end section title -->

                        <!-- item -->
                        @foreach($film_lainnya->sortByDesc('created_at')->take(6) as $item)
                            <div class="col-6 col-sm-4 col-lg-6">
                                <div class="item">
                                    <div class="item__cover">
                                        <img src="{{ asset('images/film/' . $item->poster)}}" alt="">
                                        <a href="{{ url('detail', $item->id) }}" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>
                                        @php
                                        $rating = $item->rating;
                                        $ratingClass = 'item__rate--red';

                                        if ($rating >= 8) {
                                            $ratingClass = 'item__rate--green';
                                        } elseif ($rating >= 7) {
                                            $ratingClass = 'item__rate--yellow';
                                        }
                                    @endphp

                                    <span class="item__rate {{ $ratingClass }}">{{ $rating }}</span>
                                        <button class="item__favorite" type="button"><i class="ti ti-bookmark"></i></button>
                                    </div>
                                    <div class="item__content">
                                        <h3 class="item__title"><a href="{{ url('detail', $item->id) }}">{{ $item->judul }}</a></h3>
                                        <span class="item__category">
                                            <a href="#">{{ $item->kategori->nama_kategori}}</a>
                                            <a href="#">{{ $item->genre->nama_genre}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- end item -->
                    </div>
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- end content -->

    <!-- footer -->
   @include('include.frontend.footer')
    <!-- end footer -->

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
        It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <!-- Preloader -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/splide.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/slimselect.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/smooth-scrollbar.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plyr.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/photoswipe.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
