@extends('frontend.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3 mt-3">
            <img src="{{ asset('assets/images/logo.png') }}" class="rounded mx-auto d-block" width="150" alt="">
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($carts as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if($item->status == 1)
                                    Sudah Pesan & Belum dibayar
                                    @else
                                    Sudah dibayar 
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($item->jumlah_harga-$item->kode) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $item->id }}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection