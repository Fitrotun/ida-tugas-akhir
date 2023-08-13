@extends('frontend.include.template')
@section('title','Detail Berita')
@section('content')

<style>
	#map { height: 180px; }
</style>

@include('frontend.include.navbar')

<section class="detailwisata">
    <div class="container" style="margin-top: 105px;margin-bottom: 20px;">
        <div class="card border-0" style="background-color: #cdcdcd;">
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
                <p class="card-text my-3">{{ $wisata->description }}</p>
                <h3 class="text-end fw-bold" style="margin-right:55px;">Rp. {{ number_format($wisata->price) }}</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/detail/{{ $wisata->id }}" class="button button-wisata">Booking Ticket</a>
                </div>
            </div>
          </div>
    </div>
    <div class="container" style="margin-bottom: 20px;">
        <div class="card border-0" style="background-color: #cdcdcd">
            <div class="card-body p-lg-4">
                <h2 class="card-title fw-bold mb-2">Info Lokasi</h2>
                <div id="map" style="height: 400px;"></div>
                
                {{-- <div id="map">
                    <iframe width="800" height="300" frameborder="0" src="https://www.bing.com/maps/embed?h=300&w=800&cp=-7.355971881063553~109.90476125968826&lvl=14.164355034644323&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
                    </iframe>
                    <p>{{ $wisata->location }}</p>
                    <div style="white-space: nowrap; text-align: center; width: 800px; padding: 6px 0;">
                       <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=-7.355971881063553~109.90476125968826&amp;sty=r&amp;lvl=14.164355034644323&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
                       <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=-7.355971881063553~109.90476125968826&amp;sty=r&amp;lvl=14.164355034644323&amp;rtp=~pos.-7.355971881063553_109.90476125968826____&amp;FORM=MBEDLD">Get Directions</a>
                   </div>
               </div> --}}
                {{-- 
                <img width="1000" height="300" src="https://api.mapbox.com/styles/v1/mapbox/light-v9/static/pin-s+f00(30.055867,51.408365)/30.0558434,51.4082343,15,0,0/640x480?access_token=pk.eyJ1Ijoibmlja2ZpdHoiLCJhIjoiY2p3d2g3N2F5MDZ4azQwcG12dWticDB0diJ9.qnQV5QgYN_eDwg4uUdbO6Q" alt="Pripyat Amusement Park" class="static-map">
                
                {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="" class="button button-wisata"> Lihat Detail Peta</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 20px;">
        <div class="card border-0" style="background-color: #cdcdcd">
            <div class="card-body p-lg-4">
                <h2 class="card-title fw-bold mb-2">Tambah Ulasan</h2>
                <div class="card border-0" style="background-color: #ffffff">
                    <div class="card-body p-lg-4">
                        <form action="/komen/{{ $wisata->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="user">
                                <div class="row row-cols-auto mb-2">
                                    <div class="col-md-11">
                                        <div class="form-group row">
                                        <label class="col fw-bold">Komentar</label>
                                        <div class="card-text sm-14 p-2 align-baseline">
                                            <input class="form-control" name="description" type="text"/>
                                            @error('description')
                                                <code>
                                                    {{ $message }}
                                                </code>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary offset-md-10" value="Submit">
                        </form>
                    </div>
                    
                    
                </div>
                @if ($komen)
                    <div class="card-body p-lg-4">
                        <div class="user">
                            {{-- {{ dd($komen) }} --}}
                            @foreach ($komen as $komen)
                                
                                <div class="row row-cols-auto mb-2">
                                    <div class="col-sm-1">
                                        <img src="https://www.its.ac.id/aktuaria/wp-content/uploads/sites/100/2018/03/user.png" alt="fotoprofil" width="60" height="60" class="d-inline-block align-text-top">
                                    </div>
                                    <div class="col p-0 align-baseline mr-3">
                                        <h6 class="wisata fw-bold" style="margin-top:10px">{{ $komen->user->name }}</h6>
                                        <h6 class="wisata" style="margin-top:3px">{{ $komen->description }}</h6>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        {{-- <p class="card-text"><small class="text">Rate</small></p>
                        {{-- <div class="row justify-content-start">
                            <div class="col-3 px-0 ml-5">
                                <img src={{ asset('assets/frontend/css/images/telagawarna.png') }} class="img-fluid rounded">
                            </div>
                        </div> --}}
                    </div> 
                    @else
                    
                    @endif
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
<script>
    var map = L.map('map').setView([-7.35805671239407, 109.91492220542723], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var wisataData = <?= $maps; ?>  ;
    L.marker([wisataData.latitude, wisataData.longitude]).addTo(map)
        .bindPopup(wisataData.name)
        .openPopup();
</script>
@endpush