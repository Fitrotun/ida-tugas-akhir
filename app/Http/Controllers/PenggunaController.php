<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wisata;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('user') && $this->middleware('login');
    }

	// Tampil profile user
    public function __invoke(Request $request)
    {
        $data ['title'] = 'Profile User';
    	$data ['user'] = User::where('id', session('id'))->first();

    	return view('frontend.pages.user.profile', $data);
    }

	// Update profil user
    public function update(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', session('id'))->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->noHp = $request->noHp;
    	$user->alamat = $request->alamat;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	return redirect('/profile');
    }

    // detail cart
    public function dcart($id){
        $data['wisata'] = Wisata::find($id);

        return view('frontend.pages.user.bookingtiket', $data);
    }

	// booking tiket
    public function pesan(Request $request, $id){
        // dd($request);
    	$wisata = Wisata::where('id', $id)->first();

    	//cek validasi
    	$cek_cart = Cart::where('user_id', session('id'))->where('status',0)->first();

    	//simpan ke database cart
    	if(empty($cek_cart))
    	{
    		$cart = new Cart;
	    	$cart->user_id = session('id');
	    	$cart->tanggal = $request->tanggal;
	    	$cart->status = 0;
	    	$cart->jumlah_harga = 0;
            $cart->kode = mt_rand(100, 999);
	    	$cart->save();
    	}
    	

    	//simpan ke database cart detail
    	$cart_baru = Cart::where('user_id', session('id'))->where('status',0)->first();

    	//cek cart detail
    	$cek_transaksi = Transaksi::where('wisata_id', $wisata->id)->where('cart_id', $cart_baru->id)->first();
    	if(empty($cek_transaksi))
    	{
    		$transaksi = new Transaksi;
	    	$transaksi->wisata_id = $wisata->id;
	    	$transaksi->cart_id = $cart_baru->id;
	    	$transaksi->jumlah = $request->jumlah_pesan;
			$transaksi->image = "aaa";
	    	$transaksi->jumlah_harga = $wisata->price*$request->jumlah_pesan;
	    	$transaksi->save();
    	}else 
    	{
    		$transaksi = Transaksi::where('wisata_id', $wisata->id)->where('cart_id', $cart_baru->id)->first();

    		$transaksi->jumlah = $transaksi->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_transaksi_baru = $wisata->price*$request->jumlah_pesan;
	    	$transaksi->jumlah_harga = $transaksi->jumlah_harga+$harga_transaksi_baru;
	    	$transaksi->update();
    	}

    	//jumlah total
    	$cart = Cart::where('user_id', session('id'))->where('status',0)->first();
    	$cart->jumlah_harga = $cart->jumlah_harga+$wisata->price*$request->jumlah_pesan;
    	$cart->update();
    	
    	return redirect('/check-out');  
    }

    // upload bukti transaksi
	public function epesan(Request $request, $id)
    {
        $transaksi= Transaksi::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg|max:2040'
            ]);
        
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/transaksi/', $new_image);
        $transaksi->image = 'uploads/transaksi/'.$new_image;
        }

        
        // $transaksi->name= $request->name;
        // $transaksi->description= $request->description;
        $transaksi->save();

        return redirect('/konfirmasi');
    }

	// Memasukkan barang ke keranjang
    public function check_out()
    {
        $title = 'Cart';
        $cart = Cart::where('user_id', session('id'))->where('status',0)->first();
 	    $transaksi = [];
        if(!empty($cart))
        {
            $transaksi = Transaksi::where('cart_id', $cart->id)->get();
        }
        
        return view('frontend.pages.user.keranjang', compact('cart', 'transaksi', 'title'));
    }


	// Konfrimasi pesanan yang ingin di check_out
	public function konfirmasi()
    {
        $user = User::where('id', session('id'))->first();

        if(empty($user->password))
        {
            return redirect('profile');
        }

        $cart = Cart::where('user_id', session('id'))->where('status',0)->first();
        $cart_id = $cart->id;
        $cart->status = 1;
        $cart->update();

        $transaksis = Transaksi::where('cart_id', $cart_id)->get();
        foreach ($transaksis as $transaksi) {
            $wisata = Wisata::where('id', $transaksi->wisata_id)->first();
            // $wisata->stok = $wisata->stok-$transaksi->jumlah;
            $wisata->update();
        }

        return redirect('/history');
    }

	// Tampil History 
	public function index()
    {
        $data ['title'] = 'History';
        $data['carts'] = Cart::where('user_id', session('id'))->where('status', '!=',0)->get();

    	return view('frontend.pages.user.history', $data);
    }

    public function struk($id)
    {
        $title = 'Detail Riwayat';
    	$cart = Cart::where('id', $id)->first();
    	$transaksi = Transaksi::where('cart_id', $cart->id)->get();

    	return view('frontend.pages.user.struk', compact('title','cart','transaksi'));
    }

    // tambah komentar
    public function insert(Request $request, $id)
    {
        // dd($request->all(),$id);
        $wisata = Wisata::where('id', $id)->first();
        
    	// cek validasi
    	$komen = Comment::where('user_id', session('id'))->get();
        // dd($komen, session('id'));
    	// simpan ke database comment
    	if($komen)
    	{
            // $image = $request->image;
            // $slug = ($image->getClientOriginalName());
            // $new_image = time() .'_'. $slug;
            // $image->move('uploads/comment/' ,$new_image);
           
    		$comment = new Comment;
            $comment->wisata_id = $wisata->id;
	    	$comment->user_id = session('id');
	    	$comment->description = $request->description ;
	    	$comment->image = 'aa';
	    	$comment->save();
        }else {

            // Comments already exist for the user
            // Handle the case where comments exist
        }
        
        return redirect("/detailwisata/$id");
    }
}
