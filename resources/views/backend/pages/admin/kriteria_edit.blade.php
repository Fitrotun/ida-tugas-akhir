@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Informasi Kriteria</h4>
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

      <form method="post" action="/kriteria/{{ $kriterias->id }}" id="myForm" enctype="multipart/form-data" class="row g-3">
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Kriteria Seputar Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="desk" class="from-label">No</label>
            <input type="text" class="form-control @error('no') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="no" value="{{ $kriterias->no }}" > 
            @error('no')
                <div class="invalid-feedback">
                   No tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desk" class="from-label">Kriteria</label>
            <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
            id="exampleInputPassword1" name="kriteria" value="{{ $kriterias->kriteria }}" > 
            @error('kriteria')
                <div class="invalid-feedback">
                    Kriteria tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="desk" class="from-label">Code</label>
          <input type="text" class="form-control @error('code') is-invalid @enderror"
          id="exampleInputPassword1" name="code" value="{{ $kriterias->code }}" > 
          @error('code')
              <div class="invalid-feedback">
                  Code tidak boleh kosong
              </div>
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