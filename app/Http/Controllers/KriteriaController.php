<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari database
        $kriterias = Kriteria::all();

        // Kirim data produk ke view
        return view('backend.pages.admin.kriteria', ['kriterias' => $kriterias]);
    }
    

    public function create()
    {
        $data ['title'] = 'Tambah Data Kriteria';
        
        $data['kriterias '] = Kriteria::all();

        
        return view('backend.pages.admin.kriteria_add', $data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'kriteria' => 'required',
            'code' => 'required',
            
        ]);
        //=======================

        $kriterias = new Kriteria();
        $kriterias->no= $request->no;
        $kriterias->kriteria= $request->kriteria;
        $kriterias->code= $request->code;
        $kriterias->save();
        return to_route('kriteria.index');
        // return redirect()->intended('/kriteria');
    }

    public function edit($id)
    {

        $data ['title'] = 'Edit Kriteria';
        $data['kriterias'] = Kriteria::find($id);

        return view('backend.pages.admin.kriteria_edit', $data);

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no' => 'required',
            'kriteria' => 'required',
            'code' => 'required',
        ]);

        $kriterias= Kriteria::find($id);
        $kriterias->no= $request->no;
        $kriterias->kriteria= $request->kriteria;
        $kriterias->code= $request->code;
        $kriterias->save();
        
        

        return redirect('/kriteria');
    }

    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect("/kriteria")->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
