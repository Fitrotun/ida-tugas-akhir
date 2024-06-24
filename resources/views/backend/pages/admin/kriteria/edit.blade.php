@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Informasi kriteria</h4>
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

      <form method="post" action="{{route('kriteria.update',$kriteria->id)}}" id="myForm" enctype="multipart/form-data" class="row g-3">
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Kriteria Seputar Wisata Wonosobo
        </p>
      <div class="mb-3">
        <label for="desk" class="from-label">Bobot kriteria</label>
        <input type="number" name="bobot" id="" class="form-control @error('bobot') border-danger @enderror" placeholder="Nilai Bobot" step="any" value="{{$kriteria->bobot}}">
                    @error('bobot')
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
