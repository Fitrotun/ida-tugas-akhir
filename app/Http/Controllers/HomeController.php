<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Berita;
use App\Models\Promosi;
use App\Models\Comment;

class HomeController extends Controller
{
    // Home
    public function index(){
        return view('frontend.pages.home',[
            'title' => 'HomePage',
            'wisata' => Wisata::latest()->paginate(3),
            'komen' => Comment::latest()->paginate(3),
            'category' => Category::all(),
            'promosi' => Promosi::first(),
        ]);  
    }

    // Info Berita
    public function bindex(){
        return view('frontend.pages.infoberita',[
            'title' => 'Berita',
            'berita' => Berita::all(),
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
            'wisata' => Wisata::all(),
        ]);  
    }

    // Detail Wisata
    public function dwisata($id){
        return view('frontend.pages.detailwisata',[
            'title' => 'Wisata List',
            'wisata' => Wisata::find($id),
            'maps' => json_encode(Wisata::find($id)),
            'komen' => Comment::where('wisata_id',$id)->get(),
        ]);  
    }

}
