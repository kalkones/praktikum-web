<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('dosen')->get();
        return view('matakuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('matakuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil ditambahkan');
    }

    public function show(MataKuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(MataKuliah $matakuliah)
    {
        $dosens = Dosen::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosens'));
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil diperbarui');
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil dihapus');
    }
}