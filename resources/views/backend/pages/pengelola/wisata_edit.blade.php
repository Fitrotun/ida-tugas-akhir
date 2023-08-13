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
        <p class="card-description" style="margin-top: 1%">
            Location
          </p>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Latitude</label>
                <div class="col-sm-9">
                  <input type="text" name="latitude" class="form-control" value="{{ $wisatas->latitude }}"/>
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
                  <input type="text" name="longitude" class="form-control" value="{{ $wisatas->longitude }}" />
                  @error('longitude')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
                </div>
              </div>
            </div>
        </div>
        {{-- <div class="mb-3">
            <label for="price" class="form-label">Location</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror"
                id="exampleInputPassword1" name="location" value="{{ $wisatas->location }}">
            @error('location')
                <div class="invalid-feedback">
                    Lokasi tidak boleh kosong
                </div>
            @enderror
        </div> --}}
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