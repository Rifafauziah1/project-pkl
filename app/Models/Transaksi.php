<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";

    protected $fillable = ['id_buku', 'id_pembeli', 'nama_pembeli', 'judul', 'tgl_beli', 'jumlah_buku', 'alamat', 'harga', 'total'];
    protected $visible = ['id_buku', 'id_pembeli', 'nama_pembeli', 'judul', 'tgl_beli', 'jumlah_buku', 'alamat', 'harga', 'total'];
    public $timestamps = true;

    public function buku()
    {
        //data model book bisa dimiliki oleh model author
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Buku', 'judul', 'harga');
    }
    public function pembeli()
    {
        //data model book bisa dimiliki oleh model author
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Pembeli', 'nama_pembeli', 'tgl_beli', 'alamat');

    }
}
