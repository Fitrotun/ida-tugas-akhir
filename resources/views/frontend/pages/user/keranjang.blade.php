<html lang="en">
    @include('frontend.include.header')
<head>
    <title>Booking Tiket</title>
    @include('frontend.include.navbar')
    @yield('content')
    @include('frontend.include.source')
</head>
<body>
    <div class="container mt-5">
        <div class="mt-5">
            
        </div>
        <h1>Tiket yang Dipesan</h1>
        @if(!empty($cart))
            @foreach($transaksi as $item)
                <div class="ticket mt-3">
                    <img src={{ asset('assets/frontend/css/images/Sinsu.jpeg') }} class="card-img-top rounded mb-3" alt="Tiket 1">
                        <div class="info">
                        <h5>Nama Wisata :  {{ $item->wisata->name }}</h5>
                        <p>Tanggal Tiket:  {{ $item->cart->tanggal }}</p>
                        <p>Harga Tiket  : Rp.  {{ number_format($item->wisata->price) }}</p>
                        <p>Jumlah Tiket :  {{ $item->jumlah }}</p>
                        </div>
                </div>
            @endforeach
            <div class="total mt-4 mb-5">
                <p colspan="5" align="right">Total Harga : Rp. {{ number_format($item->jumlah_harga) }}</p>
                <p colspan="5" align="right">Potongan : Rp. {{ number_format($item->cart->kode) }}</p>
                <p colspan="5" align="right">Jumlah yg Harus dibayar : Rp. {{ number_format($item->jumlah_harga-$item->cart->kode) }}</p>
                {{-- <a href="{{ url('konfirmasi') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                    <i class="fa fa-shopping-cart"></i> Check Out
                </a> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Bayar Pesanan 
                </button>
            </div>
        @endif
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transaksi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/upload/{{ $item->id }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($cart->jumlah_harga-$cart->kode) }}</strong></h5>
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="formFile"
                        accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>
@include('frontend.include.footer')

