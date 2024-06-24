@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Parameter</h4>

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
      <form class="form-sample" method="POST" action="{{route('parameter.store')}}" enctype="multipart/form-data">
        @csrf
        <p class="card-description">
          Informasi Parameter
        </p>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Kriteria</label>
              <div class="col-sm-9">
                <select name="kriteriaID" id="" class="form-control">
                    <option>Pilih Kriteria</option>
                    @foreach ($kriteria as $item)
                    <option value="{{$item->id}}">{{$item->nama_kriteria}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Parameter Kriteria</label>
              <div class="col-sm-9">
                <input type="text" name="namaParameter" id="" class="form-control @error('namaParameter') border-danger @enderror" placeholder="Nama Parameter Kriteria">
                    @error('namaParameter')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Bobot </label>
                <div class="col-sm-9">
                    <input type="number" name="nilaiBobot" id="" class="form-control @error('nilaiBobot') border-danger @enderror" placeholder="Nilai Bobot" min="1">
                    @error('nilaiBobot')
                        <small class="text-danger fw-bold">{{$message}}</small>
                    @enderror
                </div>
              </div>
          </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

@endsection
