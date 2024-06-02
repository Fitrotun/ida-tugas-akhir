@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Informasi Wisata</h4>

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

      <form method="post" action="/wisata/{{ $wisatas->id }}" id="myForm" enctype="multipart/form-data" class="row g-3">
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="desk" class="from-label">Nama Wisata</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="name" value="{{ $wisatas->name }}" > 
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div>
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" name="image" id="formFile"
        accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="mt-3"><img src="{{ asset($wisatas->image) }}" id="output" width="400"></div>

        <div class="mb-3">
            <label for="desk" class="from-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror"
            id="exampleInputPassword1" name="description" value="{{ $wisatas->description }}" > 
            @error('description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desk" class="from-label">Rating</label>
            <input type="text" class="form-control @error('rating') is-invalid @enderror"
            id="exampleInputPassword1" name="rating" value="{{ $wisatas->rating }}" > 
            @error('rating')
                <div class="invalid-feedback">
                    Rating tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"
                id="exampleInputPassword1" name="price" value="{{ $wisatas->price }}">
            @error('price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="jam_buka" class="form-label">Jam Buka</label>
          <input type="text" class="form-control @error('jam_buka') is-invalid @enderror"
              id="exampleInputPassword1" name="jam_buka" value="{{ $wisatas->jam_buka }}">
          @error('jam_buka')
              <div class="invalid-feedback">
                  Jam buka tidak boleh kosong
              </div>
          @enderror
      </div>
      <div class="mb-3">
        <label for="jarak" class="form-label">Jarak</label>
        <input type="text" class="form-control @error('jarak') is-invalid @enderror"
            id="exampleInputPassword1" name="jarak" value="{{ $wisatas->jarak }}">
        @error('jarak')
            <div class="invalid-feedback">
                Jarak tidak boleh kosong
            </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="fasilitas" class="form-label">Fasilitas</label>
      <input type="text" class="form-control @error('fasilitas') is-invalid @enderror"
          id="exampleInputPassword1" name="fasilitas" value="{{ $wisatas->fasilitas }}">
      @error('fasilitas')
          <div class="invalid-feedback">
              Fasilitas tidak boleh kosong
          </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="transportasi" class="form-label">Transportasi</label>
    <input type="text" class="form-control @error('transportasi') is-invalid @enderror"
        id="exampleInputPassword1" name="transportasi" value="{{ $wisatas->transportasi }}">
    @error('transportasi')
        <div class="invalid-feedback">
            Transportasi tidak boleh kosong
        </div>
    @enderror
</div>
       
        <div class="mb-3">
            <label for="category" class="form-label">Pilih Category</label>
            <select class="form-select @error('id_category') is-invalid @enderror" aria-label="Default select example"
            name="id_category">
            @foreach ($category as $item)
                <option value="{{ $item->id }}" {{ $wisatas->id_category == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    Pilih salah satu kategori
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