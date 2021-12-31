<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->string('judul');
            $table->date('tgl_beli');
            $table->integer('jumlah_buku');
            $table->string('alamat');
            $table->integer('harga');
            $table->integer('total');
            $table->foreign('id_buku')->references('id')->on('buku')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pembeli')->references('id')->on('pembeli')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('transaksi');
    }
}
