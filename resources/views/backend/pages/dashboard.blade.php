<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend/include/head')
</head>
<body>
  <div class="container-scroller">
    @include('backend/include/navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('backend/include/settings')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('backend/include/_sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" id="body">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs no-print" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link">Dashboard</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#pasien" role="tab" aria-selected="false">Pasien</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#pengguna" role="tab" aria-selected="false">Pengguna</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#obat" role="tab" aria-selected="false">Obat</a>
                    </li>
                    <li class="nav-item" style="display: none">
                      <a class="nav-link" id="more-tab" data-bs-toggle="tab" href="#transaksi" role="tab" aria-selected="false">Transaksi</a>
                    </li>  -->
                  </ul>
                  <div>
                    <div class="btn-wrapper no-print">
                      {{-- <a onclick="window.print()" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <button id="export" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</button> --}}
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="pasien" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12 no-print">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Administrator</p>
                            <h3 class="rate-percentage">{{ $jml_admin }}</h3>
                            {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>Orang</span></p> --}}
                          </div>
                          <div>
                            <p class="statistics-title">Pengelola</p>
                            <h3 class="rate-percentage">{{ $jml_pengelola }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">User</p>
                            <h3 class="rate-percentage">{{ $jml_user }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Wisata</p>
                            <h3 class="rate-percentage">{{ $jml_wisata }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Category</p>
                            <h3 class="rate-percentage">{{ $jml_category }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Berita</p>
                            <h3 class="rate-percentage">{{ $jml_berita }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Promosi</p>
                            <h3 class="rate-percentage">{{ $jml_promosi }}</h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Transaksi</p>
                            <h3 class="rate-percentage">{{ $jml_transaksi }}</h3>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('backend/include/footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  {{-- LOADED SCRIPT --}}
  @include('backend/include/foot')
  <!-- End custom js for this page-->
</body>

</html>

