<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function wisata()
	{
	      return $this->belongsTo(Wisata::class);
	}

	public function cart()
	{
	      return $this->belongsTo(Cart::class);
	}
}
