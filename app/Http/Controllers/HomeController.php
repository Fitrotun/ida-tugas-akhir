<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Berita;

use App\Models\Comment;
use App\Models\Kriteria;

class HomeController extends Controller
{
    // Home
    public function index(){
        return view('frontend.pages.home',[
            'title' => 'HomePage',
            'wisata' => Wisata::latest()->paginate(9),
            // 'komen' => Comment::latest()->paginate(3),
            'category' => Category::all(),
            
        ]);  
    }

    // Info Berita
    public function bindex(){
        return view('frontend.pages.infoberita',[
            'title' => 'Berita',
            'berita' => Berita::latest()->paginate(2),
        ]);  
    }

    // Detail Berita
    public function berita($id){
        return view('frontend.pages.detailberita',[
            'title' => 'Detail Berita',
            'berita' => Berita::find($id),
        ]);  
    }

    // List Wisata
    public function wisata(){
        return view('frontend.pages.wisata',[
            'title' => 'Wisata List',
            'wisata' => Wisata::latest()->paginate(8),
        ]);  
    }

    // Detail Wisata
    public function dwisata($id){
        return view('frontend.pages.detailwisata',[
            'title' => 'Wisata List',
            'wisata' => Wisata::find($id),
            // 'maps' => json_encode(Wisata::find($id)),
            // 'komen' => Comment::where('wisata_id',$id)->get(),
        ]);  
    }
    // public function kriteria(){
    //     return view('frontend.pages.rekomendasi',[
    //         'title' => 'Rekomendasi',
    //         'kriteria' => Kriteria::all(),
    //         'parameter' => Parameter::all()
    //     ]);
    // }

}
