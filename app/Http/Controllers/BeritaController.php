<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\Wisata;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.pengelola.berita',[
            'berita' => DB::table('beritas')->paginate(10),
            'title' => 'Berita'
       ]); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data ['title'] = 'Tambah Berita Wisata';
        // $data['berita'] = Berita::all();

        // return view('backend.pages.pengelola.berita_add', $data);
        return view('backend.pages.pengelola.berita_add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image'=> 'required|image|mimes:png,jpg|max:2040',
            'description' => 'required',
            
        ]);
        //=======================

        //upload image 
        $image = $request->image; 
        $slug = ($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/berita/' ,$new_image);
        $berita = new Berita();
        $berita->image = 'uploads/berita/'.$new_image;
        $berita->name= $request->name;
        $berita->description= $request->description;
        $berita->save();

        return redirect()->intended('/berita');
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
        return view("backend.pages.pengelola.berita_edit",[
            'title' => 'Pengelola - Edit Wisata',
            'item' => Berita::find($id),
        ]);
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
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ]);

        $berita= Berita::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg|max:2040'
            ]);
        
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/berita/', $new_image);
        $berita->image = 'uploads/berita/'.$new_image;
        }
        $berita->name= $request->name;
        $berita->description= $request->description;
        $berita->save();
        return redirect('/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::destroy($id);
        return redirect("/berita")->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
