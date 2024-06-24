@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Wisata Wonosobo</h4>
            <p class="card-description">
                <a href="{{ route('dataanalisa.create') }}" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
            </p>
            <br>
            <div class="card mb-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Wisata</th>
                                <th>Foto</th>
                                <th>Deskripsi</th>
                                <th>Jarak</th>
                                <th>Jam Buka</th>
                                <th>Harga Tiket</th>
                                <th>Fasilitas</th>
                                <th>Rating</th>
                                <th>Transportasi</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i)
                            <tr>
                                <td>{{ $i->nama_wisata }}</td>
                                <td>
                                    @if($i->foto && $i->foto !== '-')
                                        @php
                                            $imagePath = Storage::url('upload/wisata/'.$i->foto);
                                        @endphp
                                        <img width="60px" height="60px" src="{{ $imagePath }}" alt="Foto Wisata">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ mb_strimwidth(strip_tags($i->deskripsi), 0, 10, "...") }}</td>
                                <td>{{ $i->C1 }}</td>
                                <td>{{ $i->C2 }}</td>
                                <td>{{ $i->C3 }}</td>
                                <td>{{ $i->C4 }}</td>
                                <td>{{ $i->C5 }}</td>
                                <td>{{ $i->C6 }}</td>
                                <td>{{ $i->kategori->name }}</td>
                                <td>
                                    <form action="{{ route('dataanalisa.destroy', $i->id) }}" method="POST">
                                        {{-- Update  --}}
                                        <a type="button" href="{{ route('dataanalisa.edit', $i->id) }}" class="badge bg-warning  border-0"><i class="mdi mdi-lead-pencil"></i></a>
                                        @method("delete")
                                        @csrf
                                        {{-- Delete  --}}
                                        <button class="badge bg-danger border-0 " onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-center">
                    {{-- {{ $data -> links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
