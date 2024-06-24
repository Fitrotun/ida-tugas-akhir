<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Parameter::with('kriteria')->get();
        return view('backend.pages.admin.parameter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kriteria = Kriteria::get();
        return view('backend.pages.admin.parameter.create',['kriteria'=>$kriteria]);
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
        $message = [
            'required'=>':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'namaParameter'=>'required',
            'nilaiBobot'=>'required'
        ],$message);
        $data = new Parameter();
        $data->kriteria_id = $request->kriteriaID;
        $data->nama_parameter = $request->namaParameter;
        $data->nilai_bobot = $request->nilaiBobot;
        $data->save();
        Alert::success('Success', 'Data Berhasil Ditambahkan')->showConfirmButton('Ok', '#4391da');
        return Redirect::route('parameter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $parameter = Parameter::find($id);
        $kriteria = Kriteria::get();
        return view('backend.pages.admin.parameter.edit',compact('parameter','kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $message = [
            'required'=>':attribute tidak boleh kosong!'
        ];
        $this->validate($request, [
            'namaParameter'=>'required',
            'nilaiBobot'=>'required'
        ],$message);
        $data = Parameter::find($id);
        $data->kriteria_id = $request->kriteriaID;
        $data->nama_parameter = $request->namaParameter;
        $data->nilai_bobot = $request->nilaiBobot;
        $data->save();
        Alert::success('Success', 'Data Berhasil Diupdate')->showConfirmButton('Ok', '#4391da');
        return Redirect::route('parameter.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    Parameter::destroy($id);
    return redirect()->route('parameter.index')->with('success', 'Data Berhasil Dihapus');
}

}
