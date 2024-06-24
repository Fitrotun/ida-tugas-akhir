@extends('backend.layout.create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Hasil Rekomendasi</h4>

      @if ($rank->isEmpty())
        <div class="alert alert-warning">
          Tidak ada data alternatif yang direkomendasikan.
        </div>
      @else
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Rangking</th>
                <th>Nama Wisata</th>
                <th>Jarak</th>
                <th>Jam Buka</th>
                <th>Harga Tiket</th>
                <th>Fasilitas</th>
                <th>Rating</th>
                <th>Transportasi</th>
                <th>Total Skor</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rank as $index => $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_wisata }}</td>
                  <td>{{ $item->C1 }}</td>
                  <td>{{ $item->C2 }}</td>
                  <td>{{ $item->C3 }}</td>
                  <td>{{ $item->C4 }}</td>
                  <td>{{ $item->C5 }}</td>
                  <td>{{ $item->C6 }}</td>
                  <td>{{ $item->total }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif

    </div>
  </div>
</div>
@endsection
