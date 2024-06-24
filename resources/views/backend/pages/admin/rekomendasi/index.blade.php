@extends('backend/layout/create')

@section('konten')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Rekomendasi</h4>

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


    <form class="form-sample" method="POST" action="{{ route('rekomendasi.show') }}" enctype="multipart/form-data">
        @csrf
        <p class="card-description">
          Informasi Wisata Wonosobo
        </p>
        <div class="mb-3">
            <label for="rating" class="from-label">Jarak</label>
            <select class="form-select @error('jarak') is-invalid @enderror" aria-label="Default select example"
            name="jarak">
            <option value="">-pilih jarak-</option>
            @foreach ($jarak as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('jarak')
                <div class="invalid-feedback">
                    Pilih salah satu Jarak
                </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="jambuka" class="from-label">Jam Buka</label>
            <select class="form-select @error('jambuka') is-invalid @enderror" aria-label="Default select example"
            name="jambuka">
            <option value="">-pilih jam buka-</option>
            @foreach ($jambuka as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('jambuka')
                <div class="invalid-feedback">
                    Pilih jam buka
                </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="hargatiket" class="from-label">Harga tiket</label>
            <select class="form-select @error('hargatiket') is-invalid @enderror" aria-label="Default select example"
            name="hargatiket">
            <option value="">-pilih harga tiket-</option>
            @foreach ($hargatiket as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('hargatiket')
                <div class="invalid-feedback">
                    Pilih salah satu harga tiket
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fasilitas" class="from-label">Fasilitas</label>
            <select class="form-select @error('fasilitas') is-invalid @enderror" aria-label="Default select example"
            name="fasilitas">
            <option value="">-pilih fasilitas-</option>
            @foreach ($fasilitas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('fasilitas')
                <div class="invalid-feedback">
                    Pilih fasilitas
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating" class="from-label">Rating</label>
            <select class="form-select @error('rating') is-invalid @enderror" aria-label="Default select example"
            name="rating">
            <option value="">-pilih rating-</option>
            @foreach ($rating as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('rating')
                <div class="invalid-feedback">
                    Pilih jarak
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transportasi" class="from-label">Transportasi</label>
            <select class="form-select @error('rating') is-invalid @enderror" aria-label="Default select example"
            name="transportasi">
            <option value="">-pilih transportasi-</option>
            @foreach ($transportasi as $item)
                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
            @endforeach
            </select>
            </select>
            @error('transportasi')
                <div class="invalid-feedback">
                    Pilih transportasi
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
