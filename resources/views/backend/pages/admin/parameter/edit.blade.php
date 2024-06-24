@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Informasi Parameter</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
    @endif

      <form method="post" action="{{route('parameter.update',$parameter->id)}}" id="myForm" enctype="multipart/form-data" class="row g-3">
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Kriteria Seputar Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="desk" class="from-label">Kriteria</label>
            <select name="kriteriaID" id="" class="form-control">
                <option>Pilih Kriteria</option>
                @foreach ($kriteria as $item)
                <option value="{{$item->id}}" {{$item->id == $parameter->kriteria_id ? 'selected' : ''}}>{{$item->nama_kriteria}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="desk" class="from-label">Nama Parameter Kriteria</label>
          <input type="text" name="namaParameter" id="" class="form-control @error('namaParameter') border-danger @enderror" placeholder="Nama Parameter Kriteria" value="{{$parameter->nama_parameter}}">
          @error('namaParameter')
              <small class="text-danger fw-bold">{{$message}}</small>
          @enderror
      </div>

      <div class="mb-3">
        <label for="desk" class="from-label">Bobot Parameter</label>
        <input type="number" name="nilaiBobot" id="" class="form-control @error('nilaiBobot') border-danger @enderror" placeholder="Nilai Bobot" min="1" value="{{$parameter->nilai_bobot}}">
                    @error('nilaiBobot')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
    </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary me-2">Save</button>
        <button class="btn btn-light">Cancel</button>
        </div>
        </form>
    </div>
  </div>
</div>

@endsection
