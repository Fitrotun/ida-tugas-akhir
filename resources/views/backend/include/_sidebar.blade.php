<nav class="sidebar sidebar-offcanvas no-print" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category" {{ (session('role')=="admin")? "style=display:block" : "style=display:none" }} >Administrator</li>
      <li class="nav-item" {{ (session('role')=="admin")? "style=display:block" : "style=display:none" }}>
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" {{ (session('role')=="admin")? "aria-expanded=true" : "aria-expanded=false" }} aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Pengguna</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ (session('role')=="admin")? "show" : "" }}" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin')}}">Administrator</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('user')}}">User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('category')}}">Category</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{url('wisata')}}">Wisata</a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="{{url('berita')}}">Berita</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{url('kriteria')}}">Kriteria</a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="">Sub Kriteria</a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="">Dataset</a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="">Perhitungan</a></li> --}}

            <li class="nav-item"><a href="{{route('kriteria.index')}}" class="nav-link  {{Request::is('kriteria*') ? 'fw-bold text-primary' : ''}}">Kriteria</a></li>
            <li class="nav-item"><a href="{{route('parameter.index')}}" class="nav-link  {{Request::is('parameter*') ? 'fw-bold text-primary' : ''}}">Parameter</a></li>
            <li class="nav-item"><a href="{{route('dataanalisa.index')}}" class="nav-link  {{Request::is('dataanalisa*') ? 'fw-bold text-primary' : ''}}">Data Analisa</a></li>
            <li class="nav-item"><a href="{{route('dataalternatif.index')}}" class="nav-link  {{Request::is('dataalternatif*') ? 'fw-bold text-primary' : ''}}">Data Alternatif</a></li>
            <li class="nav-item"><a href="{{route('perhitungan.matriks')}}" class="nav-link  {{Request::is('perhitungan/matriks*') ? 'fw-bold text-primary' : ''}}">Matriks</a></li>
            <li class="nav-item"><a href="{{route('perhitungan.index')}}" class="nav-link  {{Request::is('perhitungan/hasil*') ? 'fw-bold text-primary' : ''}}">Perangkingan</a></li>
            <li class="nav-item"><a href="{{route('rekomendasi.index')}}" class="nav-link  {{Request::is('rekomendasi*') ? 'fw-bold text-primary' : ''}}">Rekomendasi</a></li>
          </ul>
        </div>
      </li>
  </nav>
