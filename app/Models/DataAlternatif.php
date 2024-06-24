<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    use HasFactory;
    protected $table ='data_alternatif';

    public function dataAnalisa()
    {
        return $this->hasOne(DataAnalisa::class, 'nama_wisata', 'nama_wisata');
    }
}
