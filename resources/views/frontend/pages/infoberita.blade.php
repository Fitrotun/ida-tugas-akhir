@extends('frontend.include.template')
@section('title','Info Berita')
@section('content')

@include('frontend.include.navbar')

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

@endsection
