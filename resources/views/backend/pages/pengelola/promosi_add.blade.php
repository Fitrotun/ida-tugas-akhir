@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Promosi</h4>
      <form class="form-sample" method="POST" action="/promosi" enctype="multipart/form-data">
        @csrf
        <p class="card-description">
          Informasi Promosi
        </p>
        <div class="mb-3 mt-4">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="formFile"
            accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
             @error('image')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3"><img src="" id="output" width="400"></div>
        <div class="mb-3">
            <label for="desk" class="from-label">Nama </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="name"  placeholder="nama wisata" >
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Potongan</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" name="price" placeholder="price">
            @error('price')
                <div class="invalid-feedback">
                    Price tidak boleh kosong
                </div>
            @enderror
         </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
    
@endsection