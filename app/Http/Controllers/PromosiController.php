<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Promosi;
use App\Models\Cart;
use App\Models\Transaksi;

class PromosiController extends Controller
{
    public function index(){
        $data ['title'] = 'Promosi';
        $data['promosi'] = DB::table('promosis')->paginate(10);

        return view('backend.pages.pengelola.promosi', $data);
    }

    public function create()
    {
        $data ['title'] = 'Tambah Data Produk';

        return view('backend.pages.pengelola.promosi_add', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image'=> 'required|image|mimes:png,jpg|max:2040',
        ]);
        //upload image 
        $image = $request->image; 
        $slug = ($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/promosi/' ,$new_image);
        
       
        $promosi = new Promosi();
        $promosi->image = 'uploads/promosi/'.$new_image;
        $promosi->name= $request->name;
        $promosi->price= $request->price;
        $promosi->save();


        return redirect()->intended('/promosi');       
    }

    public function show($id)
    {
        $data ['title'] = 'Transaksi';
        $data['transaksi'] = Transaksi::with('cart', 'wisata')->find($id);

    	return view('backend.pages.pengelola.pesanan_show', $data);
    }
    public function edit($id)
    {

        $data ['title'] = 'Edit Promosi';
        $data['item'] = Promosi::find($id);

        return view('backend.pages.pengelola.promosi_edit', $data);

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // 'image'=> 'image|file|max:1024',
            
        ]);

        $promosi= Promosi::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg|max:2040'
            ]);
        
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/promosi/', $new_image);
        $promosi->image = 'uploads/promosi/'.$new_image;
        }

        
        $promosi->name= $request->name;
        $promosi->price= $request->price;
        $promosi->save();
        return redirect('/promosi');
    }

    public function destroy($id)
    {
        Promosi::destroy($id);
        return redirect("/promosi")->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // transaksi dashbord - role pengelola
	public function pesanan()
    {
		$data ['title'] = 'Transaksi';
        $data['transaksi'] = Transaksi::with('cart', 'wisata')->get();

    	return view('backend.pages.pengelola.pesanan', $data);
    }

    public function verify(Request $request, Cart $cart){
      
        $cart = Cart::find($request)->first();

        if($cart){
            $cart->status = '2';
            $cart->save();
        }

        return redirect('/pesanan');
    }
   
	public function block(Request $request){
		  
	    $cart = Cart::find($request)->first();
	    if($cart){
            $cart->status = '1';
	        $cart->save();
	    }
   
	    return redirect('/pesanan');
	}
}
