@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Kriteria Rekomendasi Wisata</h4>
        <p class="card-description">
          <a href="/kriteria/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <br>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Atribut</th>
                <th>Bobot</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($kriteria as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->kode_kriteria}}</td>
                    <td>{{$item->nama_kriteria}}</td>
                    <td>{{$item->atribut}}</td>
                    <td class="text-center">{{$item->bobot}}</td>
                    <td class="text-center">
                        <a href="{{route('kriteria.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tbody>

              @foreach ($kriteria as $i)
              <tr>
                <td>
                  {{ $i->no}}
                </td>
                <td>
                    {{ $i->kriteria}}
                  </td>

                <td>
                  <form action="/kriteria/{{ $i->id }}" method="POST">
                    <a type="button" href="/kriteria/{{ $i->id }}/edit" class="badge bg-warning  border-0"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                      <button class="badge bg-danger border-0 " onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
                    </button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody> --}}
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection
