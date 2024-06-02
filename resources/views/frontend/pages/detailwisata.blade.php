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
                <h2 class="card-title fw-bold mb-2">{{ $wisata->name }}</h2>
                <div class="rating">
                    @php
                        $rating = $wisata->rating; 
                    @endphp
                    @for ($i = 1; $i <= $rating; $i++)
                        <span class="star fas fa-star"></span>
                    @endfor
                  </div>
                <div class="row ms-2">
                    <div class="col-9 mr-2 m-0 p-0">
                        <img class="card-img my-2 img-fluid mx-auto width-fit" src="{{ asset($wisata->image) }}" alt="">
                    </div>
                    <div class="col-2 my-3 ms-2 p-0 ">
                        <div class="row m-0 ">
                            <img class="card-img mb-3 img-fluid mx-auto width-fit rounded" src="{{ asset($wisata->image) }}" alt="">
                        </div>
                        <div class="row m-0">
                            <img class="card-img mb-3 img-fluid mx-auto width-fit" src="{{ asset($wisata->image) }}" alt="">
                        </div>
                        <div class="row m-0">
                            <img class="card-img img-fluid mx-auto width-fit" src="{{ asset($wisata->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <br><br>
          <table class="table">
            
            <tbody>
                <tr>
                    <td>Deskripsi</td>
                    <td>{{ $wisata->description }}</td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td>Rp. {{ number_format($wisata->price) }}/Orang</td>
                </tr>
              <tr>
                <td>Jam Buka</td>
                <td>{{ $wisata->jam_buka }}</td>
              </tr>
              <tr>
                <td>Jarak</td>
                <td>{{ $wisata->jarak }}</td>
              </tr>
              <tr>
                <td>Fasilitas</td>
                <td>{{ $wisata->fasilitas }}</td>
              </tr>
              <tr>
                <td>Transportasi</td>
                <td>{{ $wisata->transportasi }}</td>
              </tr>
            </tbody>
          </table>
    </div>
    <br><br>
    
@endsection