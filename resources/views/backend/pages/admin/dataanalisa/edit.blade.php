@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Wisata</h4>

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

        <form class="form-sample" method="POST" action="{{ route('dataanalisa.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p class="card-description">
          Informasi Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="namawisata" class="from-label">Nama Wisata</label>
            <input type="text" class="form-control @error('namawisata') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="namawisata" placeholder="nama wisata" value="{{ $data->nama_wisata }}">
            @error('namawisata')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3 mt-4">
            <label for="foto" class="form-label">Image</label>
            <input class="form-control" type="file" name="foto" id="formFile"
            accept="foto/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
             @error('foto')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3"><img src="{{ asset('storage/upload/wisata/'.$data->foto) }}" id="output" width="400"></div>

        <div class="mt-3 mb-3">
            <label for="description" class="from-label">Deskripsi</label>
            <textarea name="deskripsi" id="editor" cols="30" rows="10" class="replies-field">{{ old('deskripsi', $data->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jarak" class="from-label">Jarak</label>
            <select class="form-select @error('jarak') is-invalid @enderror" aria-label="Default select example" name="jarak">
                <option value="">-pilih jarak-</option>
                @foreach ($jarak as $item)
                <option value="{{ $item->id }}" {{ $data->C1 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('jarak')
                <div class="invalid-feedback">
                    Pilih salah satu Jarak
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jambuka" class="from-label">Jam Buka</label>
            <select class="form-select @error('jambuka') is-invalid @enderror" aria-label="Default select example" name="jambuka">
                <option value="">-pilih jam buka-</option>
                @foreach ($jambuka as $item)
                <option value="{{ $item->id }}" {{ $data->C2 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('jambuka')
                <div class="invalid-feedback">
                    Pilih jam buka
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hargatiket" class="from-label">Harga tiket</label>
            <select class="form-select @error('hargatiket') is-invalid @enderror" aria-label="Default select example" name="hargatiket">
                <option value="">-pilih harga tiket-</option>
                @foreach ($hargatiket as $item)
                <option value="{{ $item->id }}" {{ $data->C3 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('hargatiket')
                <div class="invalid-feedback">
                    Pilih salah satu harga tiket
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fasilitas" class="from-label">Fasilitas</label>
            <select class="form-select @error('fasilitas') is-invalid @enderror" aria-label="Default select example" name="fasilitas">
                <option value="">-pilih fasilitas-</option>
                @foreach ($fasilitas as $item)
                <option value="{{ $item->id }}" {{ $data->C4 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('fasilitas')
                <div class="invalid-feedback">
                    Pilih fasilitas
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating" class="from-label">Rating</label>
            <select class="form-select @error('rating') is-invalid @enderror" aria-label="Default select example" name="rating">
                <option value="">-pilih rating-</option>
                @foreach ($rating as $item)
                <option value="{{ $item->id }}" {{ $data->C5 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('rating')
                <div class="invalid-feedback">
                    Pilih rating
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transportasi" class="from-label">Transportasi</label>
            <select class="form-select @error('transportasi') is-invalid @enderror" aria-label="Default select example" name="transportasi">
                <option value="">-pilih transportasi-</option>
                @foreach ($transportasi as $item)
                    <option value="{{ $item->id }}" {{ $data->C6 == $item->nama_parameter ? 'selected' : '' }}>{{ $item->nama_parameter }}</option>
                @endforeach
            </select>
            @error('transportasi')
                <div class="invalid-feedback">
                    Pilih transportasi
                </div>
            @enderror
        </div>

        <div class="col-md mb-3">
            <label for="category" class="form-label">Pilih Category</label>
            <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example"
            name="category">
            <option value="">-pilih kategori wisata-</option>
            @foreach ($category as $item)
                <option value="{{ $item->id }}" {{ $item->id == $data->kategori_id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
            </select>
            @error('category')
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
