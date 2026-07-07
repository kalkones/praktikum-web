<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa', 'mataKuliah'])->get();
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $mataKuliahs = MataKuliah::all();
        return view('krs.create', compact('mahasiswas', 'mataKuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        Krs::create($request->all());

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil ditambahkan');
    }

    public function show(Krs $kr)
    {
        return view('krs.show', compact('kr'));
    }

    public function edit(Krs $kr)
    {
        $mahasiswas = Mahasiswa::all();
        $mataKuliahs = MataKuliah::all();
        return view('krs.edit', compact('kr', 'mahasiswas', 'mataKuliahs'));
    }

    public function update(Request $request, Krs $kr)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        $kr->update($request->all());

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil diperbarui');
    }

    public function destroy(Krs $kr)
    {
        $kr->delete();

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil dihapus');
    }
}