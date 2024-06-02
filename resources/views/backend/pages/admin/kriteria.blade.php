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
                <th>
                  No
                </th>
                <th>
                    Kriteria
                </th>
              
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($kriterias as $i)
              <tr>
                
                <td>
                  {{ $i->no}}
                </td>
                <td>
                    {{ $i->kriteria}}
                  </td> 
                
                <td>
                  <form action="/kriteria/{{ $i->id }}" method="POST">
                    {{-- Update  --}}
                    <a type="button" href="/kriteria/{{ $i->id }}/edit" class="badge bg-warning  border-0"><i class="mdi mdi-lead-pencil"></i></a>
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