<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        return view('ruangan.ruangan');
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaRuangan' => 'required|string|max:255|unique:ruangans,namaRuangan',
            'penanggungJawab' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        // // Simpan data ke DB (model Ruangan harus sudah ada)
        // \App\Models\Ruangan::create($request->all());

        return redirect()->route('ruangan.index')
                         ->with('success', 'Ruangan berhasil ditambahkan.');
    }


    public function show($id){

        // $ruangan = Ruangan::findOrFail($id);
        // return view('ruangan.show', compact('ruangan'));
    }

    public function edit($id){

        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'namaRuangan' => 'required|string|unique|max:255',
            'penanggungJawab' => 'required|string|max:255|unique',
            'deskripsi' => 'nullable|string'
        ]);

        // $ruangan = Ruangan::findOrFail($id);
        // $ruangan->update($request->all());

        // return redirect()->route('ruangan.index')->with('success', 'Detail Ruangan berhasil dirubah');

    }

    public function destroy($id){
            // $ruangan = Ruangan::findOrFail($id);
            // $ruangan->delete();

            return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
    }
}
