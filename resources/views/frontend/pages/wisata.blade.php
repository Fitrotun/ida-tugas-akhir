@extends('frontend.include.template')
@section('title','List Wisata')
@section('content')

@include('frontend.include.navbar')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Wisata</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wisata</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mr-5 mt-5">
            <form action="{{ url('search') }}" method="GET" class="d-flex" style="max-width: 300px;">
                <input class="form-control me-2" type="search" name="search" id="searchbar" value="{{ Request::get('search') }}" placeholder="Cari..." aria-label="Search">
                <button class="btn btn-outline-primary"  type="submit"><i class="fa fa-search"></i></button>
            </form> 
        </div>
        @foreach ($wisata as $a)
            <div class="col-md-3 mt-2">
                <div class="card">
                    <img width="200px" height="200px" src="{{ asset($a->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $a->name }}</h5>
                    <p class="card-text">
                        {{ mb_strimwidth($a->description, 0, 40, "..."); }}<br>
                    </p>
                    <a href="/detailwisata/{{ $a->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>
                    {{-- <a href="/detail/{{ $a->id }}" class="btn btn-primary">Pesan Tiket</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>   
</div>
<br>
<div class="d-flex justify-content-center">
    {{ $wisata->links() }}
</div>
@endsection