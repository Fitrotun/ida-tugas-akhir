@extends('frontend.include.template')
@section('title','Detail Berita')
@section('content')

@include('frontend.include.navbar')

<section class="detailberita">
    <div class="container mt-5">
        <div class="card my-5 border-0" style="background-color: #eceaea">
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
