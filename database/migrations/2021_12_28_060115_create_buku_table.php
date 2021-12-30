<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->integer('id_buku');
            $table->bigInteger('id_kategori')->unsigned();
            $table->bigInteger('id_pengarang')->unsigned();
            $table->bigInteger('id_penerbit')->unsigned();
            $table->string('judul');
            $table->string('nama_kategori');
            $table->string('nama_pengarang');
            $table->string('nama_penerbit');
            $table->string('deskripsi');
            $table->integer('stok');
            $table->integer('harga');
            $table->string('cover')->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pengarang')->references('id')->on('pengarang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_penerbit')->references('id')->on('penerbit')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('buku');
    }
}
