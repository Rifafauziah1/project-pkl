<?php

namespace App\Http\Controllers;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    public function index()
    {
        //
        $pengarang = Pengarang::all();
        return view('pengarang.index', compact('pengarang'));
    }
    public function create()
    {
        //
        return view('pengarang.create');
    }
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_pengarang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $pengarang = new Pengarang;
        $pengarang->nama_pengarang = $request->nama_pengarang;
        $pengarang->alamat = $request->alamat;
        $pengarang->email = $request->email;
        $pengarang->save();
        return redirect()->route('pengarang.index');
    }
    public function show($id)
    {
        //
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.show', compact('pengarang'));
    }
    public function edit($id)
    {
        //
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang'));
    }
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_pengarang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $pengarang = new Pengarang;
        $pengarang->nama_pengarang = $request->nama_pengarang;
        $pengarang->alamat = $request->alamat;
        $pengarang->email = $request->email;
        $pengarang->save();
        return redirect()->route('pengarang.index');

    }
    public function destroy($id)
    {
        //
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();
        return redirect()->route('pengarang.index');
    }

}
