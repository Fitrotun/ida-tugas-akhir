<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VerifikasiPesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'tanggal',
        'status',
        'jumlah',
        'jumlah_harga',
        'id_cart',
        'id_wisata'
    ];

    public function wisata()
	{
	      return $this->belongsTo(Wisata::class);
	}

	public function cart()
	{
	      return $this->belongsTo(Cart::class);
	}
}
