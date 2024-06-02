@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Kriteria</h4>

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
      <form class="form-sample" method="POST" action="{{ url('/kriteria') }}" enctype="multipart/form-data">
        @csrf
        <p class="card-description">
          Informasi Kriteria
        </p>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No</label>
              <div class="col-sm-9">
                <input type="text" name="no" class="form-control" placeholder="nomor" />
                @error('no')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Kriteria</label>
              <div class="col-sm-9">
                <input type="text" name="kriteria" class="form-control" placeholder="nama kriteria"/>
                @error('kriteria')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Code</label>
              <div class="col-sm-9">
                <input type="text" name="code" class="form-control" placeholder="code kriteria"/>
                @error('code')
                        <code>
                          {{ $message }}
                        </code>
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