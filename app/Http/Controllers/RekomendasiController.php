<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Facedes\File;
use App\Models\Rekomendasi;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // DASHBOARD
    public function index(){
        $data ['title'] = 'Rekomendasi';
        // $data['wisatas'] = Wisata::with('category')->get();

        return view('frontend.pages.rekomendasi', $data);

     }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $data ['title'] = 'Tambah Data Produk';
        
    //     $data['rekomendasi'] = Category::all();

    //     return view('backend.pages.pengelola.wisata_add', $data);
    // }

    // public function searchWisata(Request $request)
    // {
    //     if($request->search){
    //         $searchWisata = Wisata::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
    //         return view('frontend.pages.search', compact('searchWisata'));
    //     }
    //     else{
    //         return redirect()->back()->with('message', 'Empty Search');
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // public function store(Request $request)
    // {
    //     // dd($request->all()); 
    //      $request->validate([
    //         'name' => 'required', 
    //         'image'=> 'required|image|mimes:png,jpg|max:2040',
    //         'description' => 'required', 
    //         'rating' => 'required', 
    //         'price' => 'required',
    //         'jam_buka' => 'required', 
    //         'jarak' => 'required',
    //         'fasilitas' => 'required',
    //         'transportasi' => 'required',
    //         'latitude' => 'required', 
    //         'longitude' => 'required', 
    //         'id_category' => 'required' 
    //     ]);

        
    //     //upload image 
    //     $image = $request->image; 
    //     $image = $request->image;
    //     $slug = ($image->getClientOriginalName());
    //     $new_image = time() .'_'. $slug;
    //     $image->move('uploads/wisata/' ,$new_image);
        
       
    //     $wisatas = new Wisata();
    //     $wisatas->image = 'uploads/wisata/'.$new_image;
    //     $wisatas->name= $request->name;
    //     $wisatas->description= $request->description;
    //     $wisatas->rating= $request->rating;
    //     $wisatas->price = $request->price;
    //     $wisatas->jam_buka = $request->jam_buka;
    //     $wisatas->jarak = $request->jarak;
    //     $wisatas->fasilitas = $request->fasilitas;
    //     $wisatas->transportasi = $request->transportasi;
    //     $wisatas->latitude = $request->latitude;
    //     $wisatas->longitude = $request->longitude;
    //     $wisatas->id_category = $request->id_category;
    //     $wisatas->save();
        
    //     return to_route('wisata.index');
        
        
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    //     $data ['title'] = 'Edit Produk';
    //     $data['category'] = Category::all();
    //     $data['wisatas'] = Wisata::find($id);

    //     return view('backend.pages.pengelola.wisata_edit', $data);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'image' => 'required',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'rating' => 'required',
    //         'jam_buka' => 'required', 
    //         'jarak' => 'required',
    //         'fasilitas' => 'required',
    //         'transportasi' => 'required',
    //         'latitude' => 'required', 
    //         'longitude' => 'required', 
    //         'id_category' => 'required'
    //     ]);

    //     $wisatas= Wisata::find($id);
    //     if($request->hasFile('image')){
    //         $request->validate([
    //             'image' => 'required|image|mimes:png,jpg|max:2040'
    //         ]);
        
    //     $image = $request->image;
    //     $slug = Str::slug($image->getClientOriginalName());
    //     $new_image = time() .'_'. $slug;
    //     $image->move('uploads/wisata/', $new_image);
    //     $wisatas->image = 'uploads/wisata/'.$new_image;
    //     }

        
    //     $wisatas->name= $request->name;
    //     $wisatas->description= $request->description;
    //     $wisatas->rating= $request->rating;
    //     $wisatas->price = $request->price;
    //     $wisatas->jam_buka = $request->jam_buka;
    //     $wisatas->jarak = $request->jarak;
    //     $wisatas->fasilitas = $request->fasilitas;
    //     $wisatas->transportasi = $request->transportasi;
    //     $wisatas->latitude = $request->latitude;
    //     $wisatas->longitude = $request->longitude;
    //     $wisatas->id_category = $request->id_category;
    //     $wisatas->save();
        
        

    //     return redirect('/wisata');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Wisata::destroy($id);
    //     return redirect("/wisata")->with(['success' => 'Data Berhasil Dihapus!']);
    // }
}
