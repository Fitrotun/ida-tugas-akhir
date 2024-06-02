<!-- Topbar Start -->
<div class="container-fluid  text-light px-0 py-2" style="background: #0F4229">
  <div class="row gx-0 d-none d-lg-flex">
      <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center me-4">
              <span class="fa fa-phone-alt me-2"></span>
              <span>(0286) 321194</span>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
              <span class="far fa-envelope me-2"></span>
              <span>disparbud.wonosobo31@gmail.com</span>
          </div>
      </div>
      <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center mx-n2">
              <span>Follow Us:</span>
              <a class="btn btn-link text-light" href="https://www.facebook.com/disparbudwsbofficial/" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-link text-light" href="https://twitter.com/disparbud_WSB" target="_blank"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-link text-light" href="https://www.instagram.com/disparbudwonosobo/" target="_blank"><i class="fab fa-instagram"></i></a>
              <a class="btn btn-link text-light" href="https://www.youtube.com/@dinaspariwisatadankebudaya9600/" target="_blank"><i class="fab fa-youtube"></i></a>
          </div>
      </div>
  </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
  <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <img src="{{ asset('asset/img/logoo.png') }}" alt="Logo" width="50" class="d-inline-block align-text-top" href="#">
      <h5 class="m-0 "><font color="green">Wisata Wonosobo</h5></font>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <font color="green"><a href="{{ url('/') }}" class="nav-link  {{ request()->is('/') ? ' active-link' : '' }}">
                <span>Home</span></font>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/infoBerita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/lwisata">Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/rekomendasi">Rekomendasi</a>
          </li>
          <li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
            <a class="nav-link " href="/login">Login</a>
          </li>
          <li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
            <a class="nav-link " href="/register">Register</a>
          </li>
        <li class="nav-item dropdown" {{ session('isLogin')?"":"style=display:none" }}>
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ session('name') }}
          </a>
          @if ( session('role')== "user" ? "" : "style=display:none" )
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">Dashbord</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
          @else
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            {{-- <li><a class="dropdown-item" href="/history">Riwayat</a></li> --}}
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
          @endif
        </li>
      </ul> 
      <a  class="btn btn-success py-4 px-lg-4 rounded-0 d-none d-lg-block"></a>
      </div>
    </div>
</nav>
<!-- Navbar End -->

