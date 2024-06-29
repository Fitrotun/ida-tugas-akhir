<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Models\DataAlternatif;
use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Category as ModelsCategory;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jarak'] = Parameter::where('kriteria_id','1')->get();
        $data['jambuka'] = Parameter::where('kriteria_id','2')->get();
        $data['hargatiket'] = Parameter::where('kriteria_id','3')->get();
        $data['fasilitas'] = Parameter::where('kriteria_id','4')->get();
        $data['rating'] = Parameter::where('kriteria_id','5')->get();
        $data['transportasi'] = Parameter::where('kriteria_id','6')->get();
        return view('backend.pages.admin.rekomendasi.index',$data);
    }
    public function userindex()
    {
        $data['jarak'] = Parameter::where('kriteria_id','1')->get();
        $data['jambuka'] = Parameter::where('kriteria_id','2')->get();
        $data['hargatiket'] = Parameter::where('kriteria_id','3')->get();
        $data['fasilitas'] = Parameter::where('kriteria_id','4')->get();
        $data['rating'] = Parameter::where('kriteria_id','5')->get();
        $data['transportasi'] = Parameter::where('kriteria_id','6')->get();
        $data['category'] = Category :: get();
        return view('frontend.pages.rekomendasi',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */

     public function show(Request $request)
     {
         // Menentukan bobot untuk setiap kriteria
         $weights = [
             'C1' => $request->jarak,
             'C2' => $request->jambuka,
             'C3' => $request->hargatiket,
             'C4' => $request->fasilitas,
             'C5' => $request->rating,
             'C6' => $request->transportasi,
         ];

         // Mengambil data kriteria dan membuat mapping
         $criteria = Kriteria::whereIn('id', [1, 2, 3, 4, 5, 6])->get();
         $criteriaMapping = [];
         foreach ($criteria as $criterion) {
             $criteriaMapping[$criterion->id] = $criterion;
         }

         // Menentukan faktor normalisasi untuk setiap kriteria
         $normalizationFactors = [];
         foreach ($criteriaMapping as $criterion) {
             if ($criterion->atribut == "benefit") {
                 $normalizationFactors['C' . $criterion->id] = DataAlternatif::min('C' . $criterion->id);
             } else {
                 $normalizationFactors['C' . $criterion->id] = DataAlternatif::max('C' . $criterion->id);
             }
         }

         // Mengambil data alternatif
         $dataAlternatif = DataAlternatif::get();

         // Melakukan normalisasi data
         $normalizedData = $dataAlternatif->map(function($item) use($normalizationFactors, $criteriaMapping) {
             foreach ($normalizationFactors as $key => $value) {
                 $criterionId = str_replace('C', '', $key);
                 if ($criteriaMapping[$criterionId]->atribut == "benefit") {
                     $item->$key = $item->$key / $value;
                 } else {
                     $item->$key = $value / $item->$key;
                 }
             }
             return $item;
         });

         // Menghitung total skor untuk setiap alternatif
         $hasil = $normalizedData->map(function($item) use($weights) {
             $item->total = 0;
             foreach ($weights as $key => $weight) {
                 $item->total += $item->$key * $weight;
             }
             return $item;
         });

         // Menghitung rata-rata total skor
         $averageTotal = $hasil->avg('total');

         // Menghitung selisih dari rata-rata total skor
         $hasil = $hasil->map(function($item) use($averageTotal) {
             $item->difference = abs($item->total - $averageTotal);
             return $item;
         });

         // Mengurutkan data berdasarkan selisih terkecil dan mengambil semua data
         $rank = $hasil->sortBy('difference');

         return view('backend.pages.admin.rekomendasi.show', compact('rank'));
     }

     public function usershow(Request $request)
     {
         // Mengambil data parameter berdasarkan kriteria_id
         $kriteriaIds = [1, 2, 3, 4, 5, 6];
         $data = [
             'jarak' => Parameter::where('kriteria_id', 1)->get(),
             'jambuka' => Parameter::where('kriteria_id', 2)->get(),
             'hargatiket' => Parameter::where('kriteria_id', 3)->get(),
             'fasilitas' => Parameter::where('kriteria_id', 4)->get(),
             'rating' => Parameter::where('kriteria_id', 5)->get(),
             'transportasi' => Parameter::where('kriteria_id', 6)->get(),
         ];

         // Menentukan bobot untuk setiap kriteria
         $weights = [
             'C1' => $request->jarak,
             'C2' => $request->jambuka,
             'C3' => $request->hargatiket,
             'C4' => $request->fasilitas,
             'C5' => $request->rating,
             'C6' => $request->transportasi,
         ];

         // Mengambil data kriteria dan membuat mapping
         $criteria = Kriteria::whereIn('id', $kriteriaIds)->get()->keyBy('id');

         // Menentukan faktor normalisasi untuk setiap kriteria
         $normalizationFactors = [];
         foreach ($criteria as $criterion) {
             $column = 'C' . $criterion->id;
             if ($criterion->atribut == "benefit") {
                 $normalizationFactors[$column] = DataAlternatif::min($column);
             } else {
                 $normalizationFactors[$column] = DataAlternatif::max($column);
             }
         }

         // Mengambil data alternatif berdasarkan kategori yang dipilih
         $category = $request->category;
        //  $dataAlternatif = DataAlternatif::where('kategori_id', $category)->get();
         $dataAlternatif = DataAlternatif::get();

         // Melakukan normalisasi data
         $normalizedData = $dataAlternatif->map(function($item) use($normalizationFactors, $criteria) {
             foreach ($normalizationFactors as $key => $value) {
                 $criterionId = str_replace('C', '', $key);
                 if ($criteria[$criterionId]->atribut == "benefit") {
                     $item->$key = $item->$key / $value;
                 } else {
                     $item->$key = $value / $item->$key;
                 }
             }
             return $item;
         });

         // Menghitung total skor untuk setiap alternatif
         $hasil = $normalizedData->map(function($item) use($weights) {
             $item->total = 0;
             foreach ($weights as $key => $weight) {
                 $item->total += $item->$key * $weight;
             }
             return $item;
         });

         // Menghitung rata-rata total skor
         $averageTotal = $hasil->avg('total');

         // Menghitung selisih dari rata-rata total skor
         $hasil = $hasil->map(function($item) use($averageTotal) {
             $item->difference = abs($item->total - $averageTotal);
             return $item;
         });

         // Mengurutkan data berdasarkan selisih terkecil dan mengambil semua data
         $rank = $hasil->sortBy('difference')->take(7);

         // Menyimpan hasil ke session dan mengembalikan ke halaman rekomendasi
         return redirect()->route('rekomendasi.userindex')->with('rank', $rank);
     }


     public function detailWisata($id)
     {
         $wisata = DataAlternatif::with('dataAnalisa')->find($id);

         if ($wisata && $wisata->dataAnalisa) {
             $data = [
                 'id' => $wisata->id,
                 'nama_wisata' => $wisata->nama_wisata,
                 'C1' => $wisata->C1,
                 'C2' => $wisata->C2,
                 'C3' => $wisata->C3,
                 'C4' => $wisata->C4,
                 'C5' => $wisata->C5,
                 'C6' => $wisata->C6,
                 'data_analisa' => [
                     'deskripsi' => $wisata->dataAnalisa->deskripsi,
                     'foto' => $wisata->dataAnalisa->foto ? Storage::url('upload/wisata/'.$wisata->dataAnalisa->foto) : null,
                 ]
             ];
             return response()->json($data);
         } else {
             return response()->json(['error' => 'Wisata tidak ditemukan'], 404);
         }
     }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekomendasi $rekomendasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekomendasi  $rekomendasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekomendasi $rekomendasi)
    {
        //
    }
}
