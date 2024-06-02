@extends('frontend.include.template')
@section('title','Info Berita')
@section('content')

@include('frontend.include.navbar')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container text-center py-5">
      <h1 class="display-3 text-white mb-4 animated slideInDown">Berita</h1>
      <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb justify-content-center mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Berita</li>
          </ol>
      </nav>
  </div>
</div>
<!-- Page Header End -->
<section class="infoberita" style="margin-top: 100px;">
  @foreach ($berita as $item)
    <div class="container">
      <div class="card my-3 border-0" style="max-width: auto; background-color: #d0d0d0;">
          <div class="row g-0">
            <div class="col-md-2">
              <img width="200px" height="200px" src="{{ asset($item->image) }}" class="img-fluid rounded my-5" alt="...">
            </div>
            <div class="col">
              <div class="card-body my-2">
                <h3 class="card-title fw-bold">{{ $item->name }}</h3>
                <p class="card-text"><small class="text-body-secondary">{{ $item->created_at->format('d M Y') }}</small></p>
                <p class="card-text">{{ mb_strimwidth($item->description, 0, 100, "..."); }}</p>
                <a href="/detailberita/{{ $item->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endforeach
    
</section>
<br>
<div class="d-flex justify-content-center">
    {{ $berita->links() }}
</div>
@endsection
