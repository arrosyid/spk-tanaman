<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    // Tampilkan semua kriteria
    public function index()
    {
        // Ambil semua data kriteria dari tabel data_kriteria
        $kriteria = DataKriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk menambah kriteria baru
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan sebelum menyimpan
        $request->validate([
            'kode_kriteria' => 'required|unique:data_kriteria,kode_kriteria', // Pastikan kode kriteria unik
            'nama_kriteria' => 'required',
            'type' => 'required',
            'bobot' => 'required|numeric',
        ]);

        // Simpan data baru ke tabel data_kriteria
        DataKriteria::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data kriteria berdasarkan ID
        $kriteria = DataKriteria::findOrFail($id);
        return view(
            'kriteria.edit',
            compact('kriteria')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi inputan untuk update
        $request->validate([
            'kode_kriteria' => 'required|unique:data_kriteria,kode_kriteria,' . $id, // Pastikan kode kriteria unik kecuali untuk dirinya sendiri
            'nama_kriteria' => 'required',
            'type' => 'required',
            'bobot' => 'required|numeric',
        ]);

        // Ambil data kriteria berdasarkan ID
        $kriteria = DataKriteria::findOrFail($id);

        // Update data dengan inputan baru
        $kriteria->update($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil data kriteria berdasarkan ID dan hapus
        $kriteria = DataKriteria::findOrFail($id);
        $kriteria->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil dihapus.');
    }
}
