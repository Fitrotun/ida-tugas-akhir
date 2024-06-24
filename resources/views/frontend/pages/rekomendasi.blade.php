@extends('frontend.include.template')

@section('title', 'Rekomendasi')

@section('content')

@include('frontend.include.navbar')

<section class="detailberita">
    <div class="container mt-5">
        <div class="card my-5 border-0" style="background-color: #ebf3ed">
            <div class="card-body">
                <h2 class="card-title fw-bold text-center my-1">Rekomendasi</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rekomendasi</li>
                    </ol>
                </nav>
                <form class="form-sample" method="POST" action="{{ route('rekomendasi.usershow') }}" enctype="multipart/form-data">
                    @csrf
                    <p class="card-description">
                        Untuk mendapatkan rekomendasi wisata silahkan isi data berikut ini
                    </p>
                    <!-- Input fields for criteria -->
                    <div class="mb-3">
                        <label for="jarak" class="form-label">Jarak</label>
                        <select class="form-select @error('jarak') is-invalid @enderror" name="jarak">
                            <option value="">-pilih jarak-</option>
                            @foreach ($jarak as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('jarak')
                            <div class="invalid-feedback">Pilih salah satu Jarak</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jambuka" class="form-label">Jam Buka</label>
                        <select class="form-select @error('jambuka') is-invalid @enderror" name="jambuka">
                            <option value="">-pilih jam buka-</option>
                            @foreach ($jambuka as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('jambuka')
                            <div class="invalid-feedback">Pilih jam buka</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hargatiket" class="form-label">Harga tiket</label>
                        <select class="form-select @error('hargatiket') is-invalid @enderror" name="hargatiket">
                            <option value="">-pilih harga tiket-</option>
                            @foreach ($hargatiket as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('hargatiket')
                            <div class="invalid-feedback">Pilih salah satu harga tiket</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <select class="form-select @error('fasilitas') is-invalid @enderror" name="fasilitas">
                            <option value="">-pilih fasilitas-</option>
                            @foreach ($fasilitas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('fasilitas')
                            <div class="invalid-feedback">Pilih fasilitas</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select @error('rating') is-invalid @enderror" name="rating">
                            <option value="">-pilih rating-</option>
                            @foreach ($rating as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">Pilih rating</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="transportasi" class="form-label">Transportasi</label>
                        <select class="form-select @error('transportasi') is-invalid @enderror" name="transportasi">
                            <option value="">-pilih transportasi-</option>
                            @foreach ($transportasi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_parameter }}</option>
                            @endforeach
                        </select>
                        @error('transportasi')
                            <div class="invalid-feedback">Pilih transportasi</div>
                        @enderror
                    </div>
                    <div class="mt-4 col-12">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </div>
                </form>

                <!-- Modal for Recommendation Results -->
                <div class="modal fade" id="rekomendasiModal" tabindex="-1" aria-labelledby="rekomendasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rekomendasiModalLabel">Hasil Rekomendasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Berikut adalah 5 rekomendasi wisata terbaik berdasarkan kriteria yang Anda pilih:</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rangking</th>
                                            <th>Nama Wisata</th>
                                            <th>Jarak</th>
                                            <th>Jam Buka</th>
                                            <th>Harga Tiket</th>
                                            <th>Fasilitas</th>
                                            <th>Rating</th>
                                            <th>Transportasi</th>
                                            <th>Total Skor</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(session('rank'))
                                            @foreach (session('rank') as $index => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_wisata }}</td>
                                                    <td>{{ $item->C1 }}</td>
                                                    <td>{{ $item->C2 }}</td>
                                                    <td>{{ $item->C3 }}</td>
                                                    <td>{{ $item->C4 }}</td>
                                                    <td>{{ $item->C5 }}</td>
                                                    <td>{{ $item->C6 }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td><button class="btn btn-success btn-sm" data-id="{{ $item->id }}" onclick="showDetail(this)"><i class="bi bi-eye"></i></button></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Detail View -->
                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel">Detail Wisata</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Content will be loaded here using JavaScript -->
                                <div id="detailContent"></div>
                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div> --}}
                        </div>
                    </div>
                </div>

                @if(session('rank'))
                    <script type="text/javascript">
                        document.addEventListener('DOMContentLoaded', function () {
                            var rekomendasiModal = new bootstrap.Modal(document.getElementById('rekomendasiModal'));
                            rekomendasiModal.show();
                        });
                    </script>
                @endif

                <script type="text/javascript">
                    function showDetail(button) {
                        var id = button.getAttribute('data-id');
                        fetch(`/wisata/${id}`)
                            .then(response => response.json())
                            .then(data => {
                                var imagePath = data.data_analisa.foto ? `<img width="200px" height="auto" src="${data.data_analisa.foto}" class="card-img-top" alt="Foto Wisata">` : '<span>No Image</span>';
                                var detailContent = `
                                    ${imagePath}
                                    <h4>${data.nama_wisata}</h4>
                                    <p><strong>Deskripsi:</strong> ${data.data_analisa.deskripsi}</p>
                                `;
                                document.getElementById('detailContent').innerHTML = detailContent;
                                var detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
                                detailModal.show();
                            })
                            .catch(error => console.error('Error:', error));
                    }
                </script>

            </div>
        </div>
    </div>
</section>

@endsection
