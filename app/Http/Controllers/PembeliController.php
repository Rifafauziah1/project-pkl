<?php

namespace App\Http\Controllers;
use\App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        //
        $pembeli = Pembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }
    public function create()
    {
        //
        return view('pembeli.create');
    }
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_beli' => 'required',
        ]);

        $pembeli = new Pembeli;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->tgl_beli = $request->tgl_beli;
        $pembeli->save();
        return redirect()->route('pembeli.index');
    }
    public function show($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }
    public function edit($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_beli' => 'required',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->tgl_beli = $request->tgl_beli;
        $pembeli->save();
        return redirect()->route('pembeli.index');

    }
    public function destroy($id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.index');
    }
}
