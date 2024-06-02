@extends('frontend.include.template')
@section('title','Search Wisata')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@600&display=swap" rel="stylesheet">

@include('frontend.include.navbar')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container text-center py-5">
      <h1 class="display-3 text-white mb-4 animated slideInDown">Search Wisata</h1>
      <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb justify-content-center mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Search Wisata</li>
          </ol>
      </nav>
  </div>
</div>
<!-- Page Header End -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-2 mt-5"> 
            <h4>Search Result</h4>
            <hr size="10px" width="50%" align="left">
        </div>
        
        @forelse ($searchWisata as $a)
        
            <div class="col-md-3 mt-2">
                <div class="card">
                    <img width="200px" height="200px" src="{{ asset($a->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $a->name }}</h5>
                    <p class="card-text">
                      {{ mb_strimwidth($a->description, 0, 40, "..."); }}
                    </p>
                    <a href="/detailwisata/{{ $a->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
                  <div class="col-md-3 mt-5"></div>
                  <center><h3 style="font-family: 'Signika Negative', sans-serif;">404</h3></center>
                  <center><h4 style="font-family: 'Inconsolata', monospace;">OOPS!|Wisata tidak ditemukan</h4></center>
        @endforelse
                  <!-- <div class="col-md-3 mt-5"> 
                    {{ $searchWisata->appends(request()->input())->links() }}
                  </div> -->
    </div>
</div>
@endsection