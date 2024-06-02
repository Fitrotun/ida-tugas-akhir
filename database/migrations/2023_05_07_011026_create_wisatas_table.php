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
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->string('image');
            $table->string('name');
            $table->text('description')->nullable(true);
            $table->string('rating');
            $table->string('jam_buka');
            $table->string('jarak');
            $table->string('fasilitas');
            $table->string('transportasi');
            $table->unsignedInteger('price')->default(0);
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
        Schema::table('wisatas', function (Blueprint $table){
            $table->dropColumn('id_category');
        });
    }
};
