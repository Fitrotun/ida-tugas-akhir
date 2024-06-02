<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('login');
    // }

    // Dashboard
    public function index(){
        return view('backend.pages.dashboard', [
             'jml_admin' => DB::table('admins')->count(),
             'jml_user' => DB::table('users')->count(),
             'jml_wisata' => DB::table('wisatas')->count(),
             'jml_category' => DB::table('categories')->count(),
             'jml_berita' => DB::table('beritas')->count(),
        ]);
        
    }

}
