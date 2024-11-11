<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\DataKriteria;
use App\Models\KondisiTanah;
use Illuminate\Http\Request;

class DataTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data tanah dari tabel data_tanah
        $kondisiTanah = KondisiTanah::all();
        $result = [];

        foreach ($kondisiTanah as $item) {
            // Buat kunci unik berdasarkan `id_tanah` dan `bulan`
            $key = $item->id_tanah . '-' . $item->bulan;

            // Jika belum ada di hasil, inisialisasi
            if (!isset($result[$key])) {
                $result[$key] = [
                    'id_tanah' => $item->tanah->id,
                    'kode_tanah' => $item->tanah->kode_tanah,
                    'lokasi_tanah' => $item->tanah->lokasi_tanah,
                    'bulan' => $item->bulan,
                    'kriteria' => []
                ];
            }

            // Tambahkan `id_kriteria` dan `nilai` ke array `kriteria`
            $result[$key]['kriteria'][] = [
                'id_kriteria' => $item->id_kriteria,
                'nilai' => $item->nilai,
            ];
        }

        // Ubah hasil ke array tanpa kunci asosiatif
        $result = array_values($result);
        // $a = $result->pluck('lokasi_tanah');

        $kriteria = DataKriteria::all();
        return view('tanah.index', compact('kondisiTanah', 'kriteria', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = DataKriteria::all();
        // Tampilkan form untuk menambah kriteria baru
        return view('tanah.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan sebelum menyimpan
        $request->validate([
            'kode_tanah' => 'required',
            'lokasi_tanah' => 'required',
        ]);

        // menyimpan data tanah berdasarkan model dataTanah
        $tanah = DataTanah::create([
            'kode_tanah' => $request->input('kode_tanah'),
            'lokasi_tanah' => $request->input('lokasi_tanah'),
        ]);

        foreach ($request->input('kriteria') as $id_kriteria => $kriteria) {
            $kondisiTanah[] = new KondisiTanah([
                'id_kriteria' => $id_kriteria,
                'id_tanah' => $tanah->id,
                'nilai' => $kriteria,
                'bulan' => $request->input('bulan'),
            ]);
        }
        $tanah->kondisiTanah()->saveMany($kondisiTanah);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanah.index')->with('success', 'Data tanah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataTanah $dataTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataTanah $tanah)
    {
        // dd($tanah);
        //mengedit data tanah
        $dataTanah = DataTanah::findOrFail($tanah->id);
        $kriteria = DataKriteria::all();

        return view('tanah.edit', compact('dataTanah', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataTanah $tanah)
    {
        // Validasi inputan sebelum menyimpan
        $request->validate([
            'kode_tanah' => 'required',
            'lokasi_tanah' => 'required',
        ]);

        // menyimpan data tanah berdasarkan model dataTanah
        $tanah->update([
            'kode_tanah' => $request->input('kode_tanah'),
            'lokasi_tanah' => $request->input('lokasi_tanah'),
        ]);
        foreach ($request->input('kriteria') as $id_kriteria => $kriteria) {
            $tanah->kondisiTanah()->updateOrCreate(
                [
                    'id' => $tanah->kondisiTanah->where('id_kriteria', $id_kriteria)->first()->id ?? null,
                ],
                [
                    'id_kriteria' => $id_kriteria,
                    'bulan' => $request->input('bulan'),
                    'nilai' => $kriteria,
                ]
            );
        }
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanah.index')->with('success', 'Data tanah berhasil diupdate.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTanah $tanah)
    {
        //ambil data tanah berdasarkan ID dan hapus
        $dataTanah = DataTanah::findOrFail($tanah->id);
        // Hapus semua data KondisiTanah yang berelasi
        $dataTanah->kondisiTanah()->delete();
        // Hapus data DataTanah
        $dataTanah->delete();

        // Redirect kembali ke halaman index dengan pesan sukses    
        return redirect()->route('tanah.index')->with('success', 'Data tanah berhasil dihapus.');
    }
}
