@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Parameter Rekomendasi Wisata</h4>
        <p class="card-description">
          <a href="{{route('parameter.create')}}" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <br>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Nama Parameter</th>
                <th>Bobot</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->kriteria->nama_kriteria}}</td>
                    <td>{{$item->nama_parameter}}</td>
                    <td class="text-center">{{$item->nilai_bobot}}</td>
                    <td class="text-center">
                        <form action="{{ route('parameter.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('parameter.edit', $item->id) }}" class="badge bg-warning border-0">
                                <i class="mdi mdi-lead-pencil"></i>
                            </a>
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')">
                                <i class="mdi mdi-delete-forever"></i>
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

