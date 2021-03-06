<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = ['kode_kategori', 'nama_kategori'];
    protected $visible = ['kode_kategori', 'nama_kategori'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_kategori');
    }
}
