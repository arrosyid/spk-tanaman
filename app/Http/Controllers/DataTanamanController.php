<?php

namespace App\Http\Controllers;

use App\Models\DataSubkriteria;
use App\Models\DataTanaman;
use App\Models\DataKriteria;
use Illuminate\Http\Request;
use App\Models\DataKesesuaian;

class DataTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data tanaman
        $tanaman = DataTanaman::all();
        return view('tanaman.index', compact('tanaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kesesuaian = DataKesesuaian::all();
        $kriteria = DataKriteria::all();
        //menampilkan form untuk menambah tanaman baru
        return view('tanaman.create', compact('kesesuaian', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi inputan
        $request->validate([
            'nama_tanaman' => 'required',
            'kriteria' => 'required',
        ]);
        // dd($request->all());

        // 1. Simpan nama tanaman
        $tanaman = DataTanaman::create([
            'nama_tanaman' => $request->input('nama_tanaman'),
        ]);

        // 2. Siapkan data subkriteria
        $subkriteriaData = [];
        foreach ($request->input('kriteria') as $kriteria) {
            foreach ($kriteria as $id_kriteria => $tingkatan) {
                foreach ($tingkatan as $id_kesesuaian => $range) {
                    $subkriteriaData[] = new DataSubkriteria([
                        'id_kriteria' => $id_kriteria,
                        'id_kesesuaian' => $id_kesesuaian,
                        'range' => $range,
                    ]);
                }
            }
        }
        // dd($subkriteriaData);
        $tanaman->subkriteria()->saveMany($subkriteriaData);
        //menyimpan data tanaman
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataTanaman $tanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataTanaman $tanaman)
    {
        //
        $tanaman = DataTanaman::findOrFail($tanaman->id);
        return view(
            'tanaman.edit',
            compact('tanaman')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataTanaman $tanaman)
    {
        // Validasi inputan untuk update
        $request->validate([
            'nama_tanaman' => 'required',
        ]);

        // Ambil data tanaman berdasarkan ID
        $tanaman = DataTanaman::findOrFail($tanaman->id);

        // Update data dengan inputan baru
        $tanaman->update($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTanaman $tanaman)
    {
        // Ambil data tanaman berdasarkan ID dan hapus

        DataTanaman::findOrFail($tanaman->id)->delete();
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil dihapus.');
    }
}
