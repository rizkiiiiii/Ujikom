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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_merek');
            $table->string('tipe');
            $table->year('tahun_keluar');
            $table->string('warna');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->bigInteger('harga');
            $table->foreign('id_merek')->references('id')->on('mereks');
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
        Schema::dropIfExists('mobils');
    }
};
