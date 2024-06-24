<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnalisa extends Model
{
    use HasFactory;
    protected $table = 'data_analisa';

    protected $fillable = [
        'nama_wisata',
        'foto',
        'deskripsi',
        'C1',
        'C2','C3','C4','C5','C6',
    ];

    public function kriteria(){
        return $this->hasMany(Kriteria::class, 'kriteria_id','id');
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
