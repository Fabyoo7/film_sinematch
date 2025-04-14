<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png')}}">
  </head>

<body>

     @include('sweetalert::alert')
    

    <div class="container-scroller">
        {{-- SIDEBAR --}}
        @include('include.backend.sidebar')

        {{-- NAVBAR --}}
        <div class="container-fluid page-body-wrapper">
            @include('include.backend.navbar')

            {{-- TABEL --}}

          <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Detail Data Film</h3>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                            Film</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="putih" name="judul"
                                                value="{{ $film->judul }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2"
                                            class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_kategori" id="exampleSelectGender"
                                                disabled>
                                                @foreach ($kategori as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $film->id_kategori ? 'selected' : '' }}>
                                                        {{ $data->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2"
                                            class="col-sm-3 col-form-label">Genre</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_genre" id="exampleSelectGender"
                                                disabled>
                                                @foreach ($genre as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $film->id_genre ? 'selected' : '' }}>
                                                        {{ $data->nama_genre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Aktor
                                            </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="putih" name="aktor"
                                                value="{{ $film->aktor }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Waktu
                                            </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="putih" name="waktu"
                                                value="{{ $film->waktu }}" disabled>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal
                                            Publikasi</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tahun_rilis" class="form-control"
                                                id="putih" value="{{ $film ->tahun_rilis }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2"
                                            class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9" style="height: 100px">
                                            <textarea style="height: 100px"  class="form-control" name="sipnosis" id="putih" rows="4" disabled>{{ $film->sipnosis }}</textarea>
                                        </div>
                                    </div><br>
                                    <a href="{{ url('admin/film') }}" class="btn btn-info">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Cover</h4>
                                    @csrf
                                    <center><img class="card" src="{{ asset('images/film/' . $film->poster) }}"
                                            width="380"></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Isi
                                        Film</label>
                                    <div class="col-sm-12" style="height: 500px">
                                        <textarea style="height: 500px" class="form-control" name="isi"  id="putih" rows="4" disabled>{{ $film->sipnosis }}</textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>


      <!-- content-wrapper ends -->
           
          <!-- footer -->
        

          <!-- partial -->

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('backend/assets/js/misc.js')}}"></script>
    <script src="{{ asset('backend/assets/js/settings.js')}}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
