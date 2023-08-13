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
        <p class="card-description" style="margin-top: 1%">
            Location
          </p>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Latitude</label>
                <div class="col-sm-9">
                  <input type="text" name="latitude" class="form-control" />
                  @error('latitude')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Longitude</label>
                <div class="col-sm-9">
                  <input type="text" name="longitude" class="form-control" />
                  @error('longitude')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
              </div>
            </div>
        </div>
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