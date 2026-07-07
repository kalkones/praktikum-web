<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Krs;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with('krs.mahasiswa', 'krs.mataKuliah')->get();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $krsList = Krs::with('mahasiswa', 'mataKuliah')->get();
        return view('nilai.create', compact('krsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'krs_id' => 'required|exists:krs,id',
            'nilai_angka' => 'nullable|numeric|min:0|max:100',
            'nilai_huruf' => 'nullable|string|max:2',
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan');
    }

    public function show(Nilai $nilai)
    {
        return view('nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $krsList = Krs::with('mahasiswa', 'mataKuliah')->get();
        return view('nilai.edit', compact('nilai', 'krsList'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'krs_id' => 'required|exists:krs,id',
            'nilai_angka' => 'nullable|numeric|min:0|max:100',
            'nilai_huruf' => 'nullable|string|max:2',
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus');
    }
}