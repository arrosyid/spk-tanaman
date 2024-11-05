<?php

namespace App\Http\Controllers;

use App\Models\DataTanaman;
use Illuminate\Http\Request;

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
        //menampilkan form untuk menambah tanaman baru
        return view('tanaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi inputan
        $request->validate([
            'nama_tanaman' => 'required'
        ]);
        //menyimpan data tanaman
        DataTanaman::create($request->all());
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
