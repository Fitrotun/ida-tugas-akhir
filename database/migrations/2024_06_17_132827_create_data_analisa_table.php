<?php

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
        Schema::create('data_analisa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('C1');
            $table->string('C2');
            $table->string('C3');
            $table->string('C4');
            $table->string('C5');
            $table->string('C6');
            $table->foreignId('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_analisa');
    }
};
