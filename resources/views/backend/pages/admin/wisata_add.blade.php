@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Wisata</h4>
             
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
    

    <form class="form-sample" method="POST" action="{{ url('/wisata') }}" enctype="multipart/form-data">
        @csrf
        <p class="card-description">
          Informasi Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="name" class="from-label">Nama Wisata</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="name" placeholder="nama wisata" >
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
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

        <div class="mt-3 mb-3">
            <label for="description" class="from-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="description" placeholder="deskripsi" >

            @error('description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating" class="from-label">Rating</label>
            <input type="text" class="form-control @error('rating') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="rating" placeholder="rating" >
            @error('rating')
                <div class="invalid-feedback">
                    Rating tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Tiket</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="price" placeholder="price" >
            @error('price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="jam_buka" class="form-label">Harga Jam Buka</label>
          <input type="text" class="form-control @error('jam_buka') is-invalid @enderror" id="exampleInputEmail1"
          aria-describedby="emailHelp" name="jam_buka" placeholder="jam_buka" >
          @error('jam_buka')
              <div class="invalid-feedback">
                  Jam buka tidak boleh kosong
              </div>
          @enderror
      </div>
      <div class="mb-3">
        <label for="jarak" class="form-label">Jarak</label>
        <input type="text" class="form-control @error('jarak') is-invalid @enderror" id="exampleInputEmail1"
        aria-describedby="emailHelp" name="jarak" placeholder="jarak" >
        @error('jarak')
            <div class="invalid-feedback">
                Jarak tidak boleh kosong
            </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="fasilitas" class="form-label">Fasilitas</label>
      <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="exampleInputEmail1"
      aria-describedby="emailHelp" name="fasilitas" placeholder="fasilitas" >
      @error('fasilitas')
          <div class="invalid-feedback">
              Fasilitas tidak boleh kosong
          </div>
      @enderror
  </div>
  <div class="mb-3">
    <label for="transportasi" class="form-label">Transportasi</label>
    <input type="text" class="form-control @error('transportasi') is-invalid @enderror" id="exampleInputEmail1"
    aria-describedby="emailHelp" name="transportasi" placeholder="transportasi" >
    @error('transportasi')
        <div class="invalid-feedback">
          Transportasi tidak boleh kosong
        </div>
    @enderror

        <div class="col-md-6 mb-3">
            <label for="category" class="form-label">Pilih Category</label>
            <select class="form-select @error('id_category') is-invalid @enderror" aria-label="Default select example"
            name="id_category">
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
            @endforeach
            </select>
            @error('id_category')
                <div class="invalid-feedback">
                    Pilih salah satu kategori
                </div>
            @enderror
        </div>
    
        <div class="mt-4 col-12">
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
        </div>
         
      </form>
    </div>
  </div>
</div>
    
@endsection
