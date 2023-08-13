<html lang="en">
    @include('frontend.include.header')
    @section('title')
<head>
    <title>Booking Tiket</title>
    @include('frontend.include.navbar')
    @yield('content')
    @include('frontend.include.source')
</head>
<body>
    <div class="row md-12 mt-5">
       <div class ="container">
            <div class="col-10 mt-5">
                <h2>Booking Tiket</h2>
                <div class="p-4 mb-4 text-black">
                    <form method="post" action="{{ url('pesan') }}/{{ $wisata->id }}">
                        @csrf
                        <div class="mb-3">
                                <label for="Tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="Tanggal" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="jumlahTiket">Jumlah Tiket</label>
                                <input type="number" name="jumlah_pesan" class="form-control" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@include('frontend.include.footer')
