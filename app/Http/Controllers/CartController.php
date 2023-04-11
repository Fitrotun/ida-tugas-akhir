<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $data ['title'] = 'AS | Online Shop';
        $data['products'] = Product::with('category')->get();

        return view('frontend.home', $data);
    }

    // detail cart
    public function dcart($id){
        $data ['title'] = 'Detail Cart';
        $data['products'] = Product::find($id);

        return view('frontend.detail', $data);
    }

    
}