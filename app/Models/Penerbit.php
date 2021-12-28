<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $table = "penerbit";
    protected $fillable = ['nama_penerbit', 'alamat', 'email'];
    protected $visible = ['nama_penerbit', 'alamat', 'email'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_penerbit');
    }
}
