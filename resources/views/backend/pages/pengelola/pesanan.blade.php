@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Transaksi User</h4>
        {{-- <p class="card-description">
          <a href="/admin/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p> --}}
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Jenis Wisata
                </th>
                {{-- <th>
                  Image
                </th> --}}
                <th>
                    Jumlah Tiket
                </th>
                <th>
                    Total Harga
                </th>
                <th>
                  Status
                </th>
                <th>
                  Bukti Pembayaran
              </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksi as $i)
              <tr>
                <td>
                  {{ $i->cart->user->name }}
                </td>
                <td>
                  {{ $i->wisata->name }}
                </td>
                {{-- <td>
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                </td> --}}
                <td>
                  {{ $i->jumlah }}
                </td>
                <td>
                  Rp. {{ number_format($i->jumlah_harga-$i->cart->kode) }}
                </td>
                <td>
                  @if( $i->cart->status  == 1)
                      <form action="/verify" method="get" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $i->cart->id }}">
                          <button type="submit" class="btn btn-warning" >Verify</button>
                      </form>
                  @else
                      <form action="/block" method="get" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $i->cart->id }}">
                          <button type="submit" class="btn btn-success" >Verified</button>
                      </form>
                  @endif
              </td>
                <td>
                  <button type="button" class="badge bg-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="mdi mdi-credit-card"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bukti Transaksi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Nama User</th>
                        <th> : </th>
                        <th>{{ $i->cart->user->name }}</th>
                      </tr>
                      <tr>
                        <th>Tanggal Transaksi</th>
                        <th> : </th>
                        <th>{{ $i->created_at }}</th>
                      </tr>
                      <tr>
                        <th>Total Bayar</th>
                        <th> : </th>
                        <th>Rp. {{ number_format($i->jumlah_harga-$i->cart->kode) }}</th>
                      </tr>
                      <tr>
                        <th>Bukti Transaksi</th>
                        <th> : </th>
                        <th><img width="150px" height="150px" src="{{ asset($i->image) }}" ></th>
                      </tr>
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
      </div>
    </div>
    </div>
  </div>
@endsection