@extends('backend/layout/create')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Perangkingan</h4>
        <br>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="text-center">
                <th>Rangking</th>
                <th>Nama Wisata</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($rank as $item)
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td>{{$item->nama_wisata}}</td>
                    <td class="text-center">{{$item->C1}}</td>
                    <td class="text-center">{{$item->C2}}</td>
                    <td class="text-center">{{$item->C3}}</td>
                    <td class="text-center">{{$item->C4}}</td>
                    <td class="text-center">{{$item->C5}}</td>
                    <td class="text-center">{{$item->C6}}</td>
                    <td class="text-center">{{$item->total}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection
