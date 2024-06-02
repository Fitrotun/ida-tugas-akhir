@extends('frontend.include.template')
@section('title','Homepage')
@section('content')

@include('frontend.include.navbar')

<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="asset/img/telagawarna.png" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h6 class="display-1 text-white mb-5 animated slideInDown">Temukan Perjalanan Wisatamu</h6>
                                <p class="hero-subheader margin-top-xsm">Selamat Datang di Destinasi Wisata Wonosobo!</p>
                                <div class="container-searchbar">
                                    <form action="{{ url('search') }}" method="GET" class="searchbar" role="search">
                                        <input type="search" name="search" id="searchbar" value="{{ Request::get('search') }}" placeholder="Cari Destinasi Wisatamu! ">
                                        <button type="submit"> <img src={{ asset('assets/frontend/css/images/search.png') }} alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="asset/img/seroja.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-1 text-white mb-5 animated slideInDown">Buat Cerita Pengalamanmu Lebih Menarik</h1>
                                <p class="hero-subheader margin-top-xsm">Selamat Datang di Destinasi Wisata Wonosobo!</p>
                                <div class="container-searchbar">
                                    <form action="{{ url('search') }}" method="GET" class="searchbar" role="search">
                                        <input type="search" name="search" id="searchbar" value="{{ Request::get('search') }}" placeholder="Cari Destinasi Wisatamu! ">
                                        <button type="submit"> <img src={{ asset('assets/frontend/css/images/search.png') }} alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="asset/img/gunung.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-1 text-white mb-5 animated slideInDown">Kota Diatas Awan</h1>
                                <p class="hero-subheader margin-top-xsm">Selamat Datang di Destinasi Wisata Wonosobo!</p>
                                <div class="container-searchbar">
                                    <form action="{{ url('search') }}" method="GET" class="searchbar" role="search">
                                        <input type="search" name="search" id="searchbar" value="{{ Request::get('search') }}" placeholder="Cari Destinasi Wisatamu! ">
                                        <button type="submit"> <img src={{ asset('assets/frontend/css/images/search.png') }} alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
    <!-- Top Feature Start -->
<div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-times text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Cheap Cost</h4>
                                <span>Harga tiket yang terjangkau untuk menikmati wisata dengan panorama yang indah.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Team</h4>
                                <span>Dinas Pariwisata dan Kebudayaan(Disparbud) Kabupaten Wonosobo.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>24/7 Available</h4>
                                <span>Fast respon ketika di jam kerja</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- Top Feature End -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="asset/img/bg.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">12.502</h1>
                    <span class="fs-5 fw-semi-bold text-light">Wisatawan Lokal</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">6.589.710</h1>
                    <span class="fs-5 fw-semi-bold text-light">Wisatawan Mancanegara</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">40</h1>
                    <span class="fs-5 fw-semi-bold text-light">Destinasi Wisata</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">35</h1>
                    <span class="fs-5 fw-semi-bold text-light">Pegawai</span>
                </div>
            </div>
        </div>
</div>
    <!-- About Start -->
<div class="container-xl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="asset/img/Sinsu.jpeg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">25</h1>
                    <p class="text-primary mb-4">Year of Experience</p>
                    <h1 class="display-5 mb-4">About Wisata</h1>
                    <p class="mb-4">Wisata alam di Kabupaten Wonosobo ini banyak memiliki kawasan alam yang sangat menarik untuk disinggahi, 
                        dan wisata alam ini pun dapat dikembangkan dan dimanfaatkan sebesar-besarnya bagi kesejahteraan rakyat dengan tetap memperhatikan upaya konservasi.
                        Tak hanya keindahan wisata alamnya yang dapat dinikmati namun masih terdapat banyak wisata yang ada di wonosobo yang dapat menarik
                        para wisatawan yaitu ada wisata budaya, wisata kuliner dan juga wisata religi.
                    </p>
                    
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Achievement</h4>
                                <span>Banyak pencapaian yang diraih oleh Dinas Pariwisata dan Kebudayaan Kabupaten Wonosobo
                                    dengan memanfaatkan kekayaan alamnya.
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Dedicated Team</h4>
                                <span>Setiap wisata dikelola oleh masing-masing pengelola desa wisata.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- About End -->
    <!-- Facts Start -->

    
{{-- <section class="homepage4">
    <div class="container">
        <div class="row my-5">
            <h2 class="text-center margin-bottom-lg fw-bold">Wisata</h2>
            <br>
            @foreach ($wisata as $item)
                <div class="col-4">
                    <div class="card border-0" style="width: 18rem;">
                        <img src={{ asset($item->image) }} class="card-img-top rounded" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $item->name }}</h5>
                            <p class="card-text">{{ mb_strimwidth($item->description, 0, 40, "..."); }}</p>
                            <a href="/detailwisata/{{ $item->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

@endsection
