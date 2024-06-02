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
    // public function __construct()
    // {
    //     return $this->middleware('user') && $this->middleware('login');
    // }

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
}
