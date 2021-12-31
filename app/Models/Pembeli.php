<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = "pembeli";
    protected $fillable = ['nama_pembeli', 'alamat', 'no_hp', 'tgl_beli'];
    protected $visible = ['nama_pembeli', 'alamat', 'no_hp', 'tgl_beli'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Transaksi', 'nama_pembeli');
    }
}
