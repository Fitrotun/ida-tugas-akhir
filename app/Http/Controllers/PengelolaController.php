<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengelola;

class PengelolaController extends Controller
{
    public function __construct(){
        return $this->middleware('admin') && $this->middleware('login');
       
    }
    
    // DASHBOARD
    public function index(){
        return view('backend.pages.admin.pengelola',[
             'item' => DB::table('pengelolas')->paginate(10),
             'title' => 'Pengelola'
        ]);
        
        
     }
 
     // Tampilan Create Admin
     public function create(){
         return view('backend.pages.admin.pengelola_add');
         
     }
 
     // Create Admin
     public function store(Request $request){
        // dd($request->all());
         $validatedData=$request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'password' => 'required|min:5',
             'alamat' => 'required|min:5',
             'noHp' => 'required',
             'jenisKelamin' => 'required',

         ]);
         $validatedData['password']=bcrypt($validatedData['password']);
         Pengelola::create($validatedData); //untuk menyimpan data
         
         // toast('Registration has been successful','success');
         return redirect()->intended('/pengelola');
     }
 
     // Tampilan Edit
     public function edit($id){
         return view("backend.pages.admin.pengelola_edit",[
             'title' => 'Admin - Edit pengelola',
             'item' => Pengelola::find($id),
         ]);
         
     }
         
     // Simpan Hasil Edit
     public function update(Request $request, $id){
        // dd($request->all());
        $validatedData=$request->validate([
             'name' => 'required',
             'email' => 'required|email',
            //  'password' => 'required|min:5',
             'alamat' => 'required|min:5',
             'noHp' => 'required',
             'jenisKelamin' => 'required',
         ]);
 
         // Menyimpan update
         $user = Pengelola::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
        //  $user->password = $request->password;
         $user->alamat = $request->alamat;
         $user->noHp = $request->noHp;
         $user->jenisKelamin = $request->jenisKelamin;
         $user->save();
         
         // toast('Your data has been saved!','success');
         return redirect("/pengelola"); // untuk diarahkan kemana
     }
 
     // Hapus Data User
     public function destroy(Request $request, $id){
         Pengelola::destroy($id);
         // Session::flash('hapussuccess', 'Data berhasil dihapus!');
         // toast('Your data has been deleted!','success');
         return redirect("/pengelola"); // untuk diarahkan kemana
     } 
}
