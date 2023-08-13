@extends('frontend.include.template')
@section('title','Profile User')
@section('content')

@include('frontend.include.navbar')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10 mb-5 mt-5">
          {{-- <img src="{{ asset('assets/images/logo.png') }}" class="rounded mx-auto d-block" width="150" alt=""> --}}
      </div>
      <div class="col-md-12 mt-5 mb-5">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/history">Riwayat Pemesanan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Tiket</li>
              </ol>
          </nav>
          <div class="card">
              <div class="card-body">
                  <h3><i class="fa fa-ticket"></i> Enjoy the tour <strong>{{ $cart->user->name }}</strong></h3>
                  <h4 class="text-center my-3">{{ $transaksi[0]->wisata->name}}</h4>
                  {{-- <div class="col-md-2">
                    <img width="200px" height="200px" src="{{ asset($transaksi[0]->wisata->image) }}" class="img-fluid rounded my-2" alt="...">
                  </div> --}}
                  <div class="col">
                    <div class="card-body my-3">
                      <table class="table">
                        <thead>
                            <tr>
                              <th> </th>
                              <th>Tanggal Kunjuangan</th>
                              <th>Jumlah Tikat</th>
                              <th>Harga Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>
                              <center><img width="100px" height="100px" src="{{ asset($transaksi[0]->wisata->image) }}" class="img-fluid rounded my-2" alt="..."></center>
                            </td>
                            <td>{{ $cart->tanggal}}</td>
                            <td>{{ $transaksi[0]->jumlah}}</td>
                            <td>{{ $transaksi[0]->wisata->price}}</td>
                        </tbody>
                    </table>
                      <h4 class="card-title fw-bold" colspan="5" align="right">
                        Jumlah Harga : Rp. {{ number_format($transaksi[0]->jumlah_harga-$cart->kode) }}
                      </h4>
                    </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</div>

@endsection