<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = ['id_kategori', 'id_pengarang', 'id_penerbit' . 'judul', 'nama_kategori', 'nama_pengarang', 'nama_penerbit', 'deskripsi', 'stok', 'harga', 'cover'];
    protected $visible = ['id_kategori', 'id_pengarang', 'id_penerbit' . 'judul', 'nama_kategori', 'nama_pengarang', 'nama_penerbit', 'deskripsi', 'stok', 'harga', 'cover'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori','nama_kategori');
    }
    public function pengarang()
    {
        return $this->belongsTo('App\Models\Pengarang','id_pengarang','nama_pengarang');
    }
    public function penerbit()
    {
        return $this->belongsTo('App\Models\Penerbit','id_penerbit','nama_penerbit');
    }
    public function image()
    {
        if ($this->cover && file_exists(public_path('images/buku/' . $this->cover))) {
            return asset('images/buku/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/buku/' . $this->cover))) {
            return unlink(public_path('images/buku/' . $this->cover));
        }
    }
}
