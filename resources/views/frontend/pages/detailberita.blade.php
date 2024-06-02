@extends('frontend.include.template')
@section('title','Detail Berita')
@section('content')

@include('frontend.include.navbar')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
{{-- Swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>    

<section class="detailberita">
    <div class="container mt-5">
        <div class="card my-5 border-0" style="background-color: #ebf3ed">
            <div class="card-body">
                <h2 class="card-title fw-bold text-center my-1">{{ $berita->name }}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/infoBerita">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                    </ol>
                </nav>
                <img src="{{ asset($berita->image) }}" class="card-img my-2 img-fluid mx-auto width-fit" alt="...">
                <p class="card-text mt-1"><small class="text-body-secondary">{{ $berita->created_at->format('d M Y') }}</small></p>
                <p class="card-text mx-2">{{ $berita->description }}</p>


            </div>
          </div>
    </div>
</section>

@endsection
