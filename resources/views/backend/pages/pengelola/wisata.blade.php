@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Wisata Wonosobo</h4>
        <p class="card-description">
          <a href="/wisata/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  Nama Wisata
                </th>
                <th>
                  Image
                </th>
                <th>
                  Deskripsi
                </th>
                <th>
                  Rating
                </th>
                <th>
                  Harga Tiket
                </th>
                <th>
                  Lokasi
                </th>
                <th>
                  Category
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($wisatas as $i)
              <tr>
                <td>
                  {{ $i->name }}
                </td>
                <td>
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                {{-- @if ($i->image)
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                  @else
                    <p>tidak ada gambar</p>                   
                   @endif
                  <img width="60px" height="60px" src="{{ asset('image/').$i->image }}" > --}}
                </td>
                <td>
                  {{ mb_strimwidth($i->description, 0, 10, "..."); }}
                </td>
                <td>
                  {{ $i->rating}}
                </td>
                <td>
                  {{ $i->price}}
                </td>
                <td>
                  {{ mb_strimwidth($i->latitude, 0, 5, "..."); }},{{ mb_strimwidth($i->longitude, 0, 5, "..."); }}
                </td>
                <td>
                   {{$i->category->name }}
                </td>
                <td>
                  <form action="/wisata/{{ $i->id }}" method="POST">
                    {{-- Update  --}}
                    <a type="button" href="/wisata/{{ $i->id }}/edit" class="badge bg-warning  border-0"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                    {{-- Delete  --}}
                      <button class="badge bg-danger border-0 " onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
                    </button>
                    </form> 
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