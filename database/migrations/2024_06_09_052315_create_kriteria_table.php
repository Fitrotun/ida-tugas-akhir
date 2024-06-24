<?php

use App\Models\Kriteria;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kriteria');
            $table->string('nama_kriteria');
            $table->string('atribut');
            $table->float('bobot');
            $table->timestamps();
        });
        $data = [
            ['kode_kriteria'=>'C1','nama_kriteria'=>'Jarak','atribut'=>'cost','bobot'=>'0.5','created_at'=>now()],
            ['kode_kriteria'=>'C2','nama_kriteria'=>'Jam Buka','atribut'=>'benefit','bobot'=>'0.53','created_at'=>now()],
            ['kode_kriteria'=>'C3','nama_kriteria'=>'Harga Tiket','atribut'=>'cost','bobot'=>'0.5','created_at'=>now()],
            ['kode_kriteria'=>'C4','nama_kriteria'=>'Fasilitas','atribut'=>'benefit','bobot'=>'0.47','created_at'=>now()],
            ['kode_kriteria'=>'C5','nama_kriteria'=>'Rating','atribut'=>'benefit','bobot'=>'0.47','created_at'=>now()],
            ['kode_kriteria'=>'C6','nama_kriteria'=>'Transportasi','atribut'=>'benefit','bobot'=>'0.43','created_at'=>now()],
        ];
        Kriteria::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
};
