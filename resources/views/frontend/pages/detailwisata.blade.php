@extends('frontend.include.template')
@section('title','DetailWisata')
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
<style>
	#map { height: 180px; }
</style>
<section class="detailwisata">
    <div class="container" style="margin-top: 90px;margin-bottom: 20px;">
        <h2> <center>Detail Wisata</center></h2>
        <br>
        <div class="card border-0" style="background-color: #ffffff;">

            <div class="card-body p-lg-4">
                <h2 class="card-title fw-bold mb-2">{{ $wisata->nama_wisata }}</h2>
                <div class="rating">
                    @php
                    // dd($wisata->rating);
                        $rating = $wisata->C5;
                    @endphp
                    @for ($i = 1; $i <= $rating; $i++)
                        <span class="star fas fa-star"></span>
                    @endfor
                  </div>
                <div class="row ms-2">
                    @if($wisata->foto && $wisata->foto !== '-')
                    @php
                        $imagePath = Storage::url('upload/wisata/'.$wisata->foto);
                    @endphp
                        <img width="200px" height="200px" src="{{ $imagePath }}" class="card-img-top" alt="Foto Wisata">
                    @else
                        <span>No Image</span>
                    @endif
                </div>
            </div>
          </div>
          <br><br>
          <table class="table">
            <tbody>
                <tr>
                    <td>{!! $wisata->deskripsi !!}</td>
                </tr>
            </tbody>
          </table>
    </div>
    <br><br>

@endsection
