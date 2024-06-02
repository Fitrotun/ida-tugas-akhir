<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wisata extends Model
{
    use HasFactory;
    protected $table = "wisatas";
    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'rating',
        'jam_buka',
        'jarak',
        'fasilitas',
        'transportasi',
        'latitude',
        'longitude',
        'id_category'
    ];

    // public function get($id){
    //     $results = DB::table('wisatas')
    //         ->select('name', 'latitude', 'longitude')
    //         ->find($id);
    //     return $results;
    // }

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }

}
