<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = "pengarang";
    protected $fillable = ['nama_pengarang', 'alamat', 'email'];
    protected $visible = ['nama_pengarang', 'alamat', 'email'];
    public $timestamps = true;

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'nama_pengarang');
    }
}
