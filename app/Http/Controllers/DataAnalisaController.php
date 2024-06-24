<?php

namespace App\Http\Controllers;

use App\Models\DataAnalisa;
use App\Models\DataAlternatif;
use App\Models\Category;
use App\Models\Parameter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnalisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataAnalisa::with('kategori')->get();
        return view('backend.pages.admin.dataanalisa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['title'] = 'Tambah Data Produk';

        $data['category'] = Category::all();

        $data['jarak'] = Parameter::where('kriteria_id','1')->get();
        $data['jambuka'] = Parameter::where('kriteria_id','2')->get();
        $data['hargatiket'] = Parameter::where('kriteria_id','3')->get();
        $data['fasilitas'] = Parameter::where('kriteria_id','4')->get();
        $data['rating'] = Parameter::where('kriteria_id','5')->get();
        $data['transportasi'] = Parameter::where('kriteria_id','6')->get();
        return view('backend.pages.admin.dataanalisa.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Validasi input
    $request->validate([
        'namawisata' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'required',
        'jarak' => 'required',
        'jambuka' => 'required',
        'hargatiket' => 'required',
        'fasilitas' => 'required',
        'rating' => 'required',
        'transportasi' => 'required',
    ]);

    // Retrieve parameters based on request input
    $getJarak = Parameter::where('id', $request->jarak)->first();
    $getJamBuka = Parameter::where('id', $request->jambuka)->first();
    $getHargaTiket = Parameter::where('id', $request->hargatiket)->first();
    $getFasilitas = Parameter::where('id', $request->fasilitas)->first();
    $getRating = Parameter::where('id', $request->rating)->first();
    $getTransportasi = Parameter::where('id', $request->transportasi)->first();

    // Create new DataAnalisa instance and populate it
    $data = new DataAnalisa;
    $data->nama_wisata = $request->namawisata;

    if ($request->hasFile('foto')) {
        // Handle file upload
        $destination_path = 'upload/wisata';
        $file = $request->file('foto');
        $filename = "wisata_" . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($destination_path, $filename);
        $data->foto = $filename;
    } else {
        $data->foto = "-";
    }

    $data->deskripsi = $request->deskripsi;
    $data->C1 = $getJarak->nama_parameter;
    $data->C2 = $getJamBuka->nama_parameter;
    $data->C3 = $getHargaTiket->nama_parameter;
    $data->C4 = $getFasilitas->nama_parameter;
    $data->C5 = $getRating->nama_parameter;
    $data->C6 = $getTransportasi->nama_parameter;
    $data->kategori_id = $request->category;
    $data->save();

    // Create new DataAlternatif instance and populate it
    $dataAlternatif = new DataAlternatif;
    $dataAlternatif->dataanalisa_id = $data->id;
    $dataAlternatif->nama_wisata = $request->namawisata;
    $dataAlternatif->foto = $data->foto; // Set foto field for DataAlternatif
    $dataAlternatif->deskripsi = $request->deskripsi; // Set deskripsi field for DataAlternatif
    $dataAlternatif->C1 = $getJarak->nilai_bobot;
    $dataAlternatif->C2 = $getJamBuka->nilai_bobot;
    $dataAlternatif->C3 = $getHargaTiket->nilai_bobot;
    $dataAlternatif->C4 = $getFasilitas->nilai_bobot;
    $dataAlternatif->C5 = $getRating->nilai_bobot;
    $dataAlternatif->C6 = $getTransportasi->nilai_bobot;
    $dataAlternatif->kategori_id = $request->category; // Ensure this field is set correctly
    $dataAlternatif->save();

    // Display success message and redirect
    Alert::success('Success', 'Data Berhasil Ditambahkan')->showConfirmButton('Ok', '#4391da');
    return Redirect::route('dataanalisa.index');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAnalisa  $dataAnalisa
     * @return \Illuminate\Http\Response
     */
    public function show(DataAnalisa $dataAnalisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAnalisa  $dataAnalisa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DataAnalisa::findOrFail($id);
        $category = Category::all();
        $jarak = Parameter::where('kriteria_id', '1')->get();
        $jambuka = Parameter::where('kriteria_id', '2')->get();
        $hargatiket = Parameter::where('kriteria_id', '3')->get();
        $fasilitas = Parameter::where('kriteria_id', '4')->get();
        $rating = Parameter::where('kriteria_id', '5')->get();
        $transportasi = Parameter::where('kriteria_id', '6')->get();

        return view('backend.pages.admin.dataanalisa.edit', compact('data', 'category', 'jarak', 'jambuka', 'hargatiket', 'fasilitas', 'rating', 'transportasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAnalisa  $dataAnalisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namawisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image',
            'category' => 'required',
            'jarak' => 'required',
            'jambuka' => 'required',
            'hargatiket' => 'required',
            'fasilitas' => 'required',
            'rating' => 'required',
            'transportasi' => 'required',
        ]);

        $data = DataAnalisa::findOrFail($id);

        $getJarak = Parameter::where('id', $request->jarak)->first();
        $getJamBuka = Parameter::where('id', $request->jambuka)->first();
        $getHargaTiket = Parameter::where('id', $request->hargatiket)->first();
        $getFasilitas = Parameter::where('id', $request->fasilitas)->first();
        $getRating = Parameter::where('id', $request->rating)->first();
        $getTransportasi = Parameter::where('id', $request->transportasi)->first();

        if ($request->hasFile('foto')) {
            // Handle file upload
            $destination_path = 'upload/wisata';
            $file = $request->file('foto');
            $filename = "wisata_" . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($destination_path, $filename);
            $data->foto = $filename;
        } else {
            $data->foto = "-";
        }
        $data->deskripsi = $request->deskripsi;
        $data->C1 = $getJarak->nama_parameter;
        $data->C2 = $getJamBuka->nama_parameter;
        $data->C3 = $getHargaTiket->nama_parameter;
        $data->C4 = $getFasilitas->nama_parameter;
        $data->C5 = $getRating->nama_parameter;
        $data->C6 = $getTransportasi->nama_parameter;
        $data->kategori_id = $request->category;
        $data->save();

        $dataAlternatif = DataAlternatif::where('dataanalisa_id', $data->id)->first();
        $dataAlternatif->nama_wisata = $request->namawisata;
        $dataAlternatif->foto = $data->foto;
        $dataAlternatif->deskripsi = $request->deskripsi;
        $dataAlternatif->C1 = $getJarak->nilai_bobot;
        $dataAlternatif->C2 = $getJamBuka->nilai_bobot;
        $dataAlternatif->C3 = $getHargaTiket->nilai_bobot;
        $dataAlternatif->C4 = $getFasilitas->nilai_bobot;
        $dataAlternatif->C5 = $getRating->nilai_bobot;
        $dataAlternatif->C6 = $getTransportasi->nilai_bobot;
        $dataAlternatif->kategori_id = $request->category;
        $dataAlternatif->save();

        Alert::success('Success', 'Data Berhasil Diperbarui')->showConfirmButton('Ok', '#4391da');
        return Redirect::route('dataanalisa.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAnalisa  $dataAnalisa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataAnalisa::destroy($id);
        return redirect()->route('dataanalisa.index')->with('success', 'Data Berhasil Dihapus');
    }
}
