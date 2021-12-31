<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('buku','pembeli')->get();
        return view ('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $buku = Buku::all();
        $pembeli = Pembeli::all();
        return view('transaksi.create', compact('buku','pembeli'));
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
            'id_buku'=>'required',
            'id_pembeli'=>'required',
            'judul'=>'required',
            'tgl_beli'=>'required',            
            'jumlah_buku'=>'required',
            'alamat'=>'required',
            'harga'=>'required',
            'total'=>'required',
            'cover' => 'required|image|max:2048',
    ]);

    $transaksi = new Transaksi;
    $transaksi->id_buku = $request->id_buku;
    $transaksi->id_pembeli = $request->id_pembeli;
    $transaksi->judul = $request->judul;
    $transaksi->tgl_beli = $request->tgl_beli;
    $transaksi->jumlah_buku = $request->jumlah_buku;
    $transaksi->alamat = $request->alamat;
    $transaksi->nama_penerbit = $request->nama_penerbit;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;
    if ($request->hasFile('cover')){
        $transaksi->deleteImage();
        $image = $request->file('cover');
        $name = rand(1000, 9999) . $image->getClientOriginalName();
        $image->move('images/transaksi', $name);
        $transaksi->cover = $name;
    }
    $transaksi->save();
    return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();
        return view('transaksi.edit', compact('transaksi','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //validasi data
         $validated = $request->validate([
            'id_buku'=>'required',
            'id_pembeli'=>'required',
            'tgl_beli'=>'required',
            'judul'=>'required',
            'jumlah_buku'=>'required',
            'alamat'=>'required',
            'nama_penerbit'=>'required',
            'harga'=>'required',
            'total'=>'required',
            'harga'=>'required',
            'cover' => 'required|image|max:2048',
            ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->id_buku = $request->id_buku;
    $transaksi->id_pembeli = $request->id_pembeli;
    $transaksi->tgl_beli = $request->tgl_beli;
    $transaksi->judul = $request->judul;
    $transaksi->jumlah_buku = $request->jumlah_buku;
    $transaksi->alamat = $request->alamat;
    $transaksi->nama_penerbit = $request->nama_penerbit;
    $transaksi->harga = $request->harga;
    $transaksi->total = $request->total;
    $transaksi->harga = $request->harga;
    if ($request->hasFile('cover')){
        $transaksi->deleteImage();
        $image = $request->file('cover');
        $name = rand(1000, 9999) . $image->getClientOriginalName();
        $image->move('images/transaksi', $name);
        $transaksi->cover = $name;
    }
    $transaksi->save();
    return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }

}
