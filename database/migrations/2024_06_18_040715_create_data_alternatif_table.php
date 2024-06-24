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
        Schema::create('data_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dataanalisa_id')->constrained('data_analisa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_wisata');
            $table->string('foto');
            $table->text('deskripsi');
            $table->integer('C1');
            $table->integer('C2');
            $table->integer('C3');
            $table->integer('C4');
            $table->integer('C5');
            $table->integer('C6');
            $table->foreignId('kategori_id'); // Removed the trailing space here
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
        Schema::dropIfExists('data_alternatif');
    }
};
