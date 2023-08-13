@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Promosi</h4>
        <p class="card-description">
          <a href="/promosi/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  Nama 
                </th>
                <th>
                  Image
                </th>
                <th>
                  Potongan
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($promosi as $i)
              <tr>
                <td>
                  {{ $i->name }}
                </td>
                <td>
                @if ($i->image)
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                  @else
                    <p>tidak ada gambar</p>
                                            
                   @endif
                </td>
                <td>
                  {{ $i->price}}
                </td>
                <td>
                  <form action="/promosi/{{ $i->id }}" method="POST">
                    {{-- Update  --}}
                    <a type="button" href="/promosi/{{ $i->id }}/edit" class="badge bg-warning border-0"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                    {{-- Delete  --}}
                      <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
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