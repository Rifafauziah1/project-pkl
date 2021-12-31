<?php

namespace App\Http\Controllers;
use\App\Models\Kategori;
use\App\Models\Pengarang;
use\App\Models\Penerbit;
use\App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('kategori','pengarang','penerbit')->get();
        return view ('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori','pengarang','penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'=>'required',
            'id_kategori'=>'required',
            'id_pengarang'=>'required',
            'id_penerbit'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'harga'=>'required',
            'cover' => 'required|image|max:2048',
    ]);

    $buku = new Buku;
    $buku->judul = $request->judul;
    $buku->id_kategpri = $request->id_kategori;
    $buku->id_pengarang = $request->id_pengarang;
    $buku->id_penerbit = $request->id_penerbit;
    $buku->deskripsi = $request->deskripsi;
    $buku->stok = $request->stok;
    $buku->harga = $request->harga;
    if ($request->hasFile('cover')){
        $buku->deleteImage();
        $image = $request->file('cover');
        $name = rand(1000, 9999) . $image->getClientOriginalName();
        $image->move('images/buku', $name);
        $buku->cover = $name;
    }
    $buku->save();
    return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //validasi data
         $validated = $request->validate([
            'judul'=>'required',
            'nama_kategori'=>'required',
            'nama_pengarang'=>'required',
            'nama_penerbit'=>'required',
            'deskripsi'=>'required',
            'stok'=>'required',
            'harga'=>'required',
            'cover' => 'required|image|max:2048',
            ]);

    $buku = Buku::findOrFail($id);
    $buku->judul = $request->judul;
    $buku->nama_kategori = $request->nama_kategori;
    $buku->nama_pengarang = $request->nama_pengarang;
    $buku->nama_penerbit = $request->nama_penerbit;
    $buku->deskripsi = $request->deskripsi;
    $buku->stok = $request->stok;
    $buku->harga = $request->harga;
    if ($request->hasFile('cover')){
        $buku->deleteImage();
        $image = $request->file('cover');
        $name = rand(1000, 9999) . $image->getClientOriginalName();
        $image->move('images/buku', $name);
        $buku->cover = $name;
    }
    $buku->save();
    return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }
}
