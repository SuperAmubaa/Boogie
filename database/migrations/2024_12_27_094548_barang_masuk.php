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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('katalog_id');
            $table->foreign('katalog_id')->references('id')->on('katalog')->onDelete('cascade');
            $table->unsignedBigInteger('warna_id');
            $table->foreign('warna_id')->references('id')->on('warna')->onDelete('cascade');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->integer('stok_masuk');
            $table->string('satuan'); 
            $table->date('tanggal_masuk'); 
            $table->text('keterangan')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
