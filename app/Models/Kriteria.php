<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = "kriterias";
    protected $fillable = [
        'no',
        'kriteria',
        'code',
        // 'rating',
        // 'jam_buka',
        // 'jarak',
        // 'fasilitas',
        // 'transportasi',
        
    ];

   

    // public function category()
    // {
    //     return $this->belongsTo(Category::class,'id_category');
    // }

}
