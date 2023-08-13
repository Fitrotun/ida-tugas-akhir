<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-md-3">
    <div class="container-fluid mx-lg-5">
        <img src="{{ asset('assets/frontend/css/images/RawalaText.png') }}" alt="Logo" width="100" class="d-inline-block align-text-top" href="#">
      {{-- <a class="navbar-brand" href="#"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"> --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link text-white {{ request()->is('/') ? ' active-link' : '' }}">
                  <span>Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/infoBerita">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/lwisata">Wisata</a>
            </li>
            <li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
              <a class="nav-link text-white" href="/login">Login</a>
            </li>
            <li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
              <a class="nav-link text-white" href="/register">Register</a>
            </li>
          <li class="nav-item dropdown" {{ session('isLogin')?"":"style=display:none" }}>
            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ session('name') }}
            </a>
            @if ( session('role')== "user" ? "" : "style=display:none" )
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard">Dashbord</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
            @else
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <?php
                  $cart_utama = \App\Models\Cart::where('user_id', session('id'))->where('status',0)->first();
                  if(!empty($cart_utama))
                  {
                    $notif = \App\Models\Transaksi::where('cart_id', $cart_utama->id)->count();
                  }
                ?>
                <a class="dropdown-item" href="{{ url('check-out') }}">
                    Keranjang
                    @if(!empty($notif))
                      <span class="badge badge-danger">{{ $notif }}</span>
                    @endif
                </a>
              </li>
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><a class="dropdown-item" href="/history">Riwayat</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 100) {
        nav.classList.add('shadow');
      } else {
        nav.classList.remove('shadow');
      }
    });
  </script>
