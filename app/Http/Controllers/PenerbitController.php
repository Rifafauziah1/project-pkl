<?php

namespace App\Http\Controllers;
use\App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    //
    public function index()
    {
        //
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }
    public function create()
    {
        //
        return view('penerbit.create');
    }
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_penerbit' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $penerbit = new Penerbit;
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->email = $request->email;
        $penerbit->save();
        return redirect()->route('penerbit.index');
    }
    public function show($id)
    {
        //
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }
    public function edit($id)
    {
        //
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
    }
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_penerbit' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->email = $request->email;
        $penerbit->save();
        return redirect()->route('penerbit.index');

    }
    public function destroy($id)
    {
        //
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index');
    }

}
