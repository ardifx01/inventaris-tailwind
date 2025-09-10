<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        return view('aset.aset');
    }

    public function create()
    {
        return view ('aset.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaAset' => 'required|string|max:255|unique:asets,namaAset',
            'tipeAset' => 'required|string|in:Furnitur,Elektronik,Dekorasi,Lainnya',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // $aset = new Aset();
        // $aset->namaAset = $request->input('namaAset');
        // $aset->tipeAset = $request->input('tipeAset');
        // $aset->foto = $request->input('foto');

        // $aset->save();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan.');
    }
}
