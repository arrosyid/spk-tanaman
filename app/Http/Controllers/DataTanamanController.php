<?php

namespace App\Http\Controllers;

use App\Models\DataTanaman;
use App\Models\DataKriteria;
use Illuminate\Http\Request;
use App\Models\DataKesesuaian;
use App\Models\DataSubkriteria;
use Illuminate\Support\Facades\DB;

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
        $loop = $request->input('loop');

        foreach ($request->input('kriteria') as $index => $kriteria) {
            foreach ($kriteria as $id_kriteria => $tingkatan) {
                foreach ($tingkatan as $id_kesesuaian => $range) {
                    if ($range == null) {
                        continue;
                    }else{
                        $subkriteriaData[] = new DataSubkriteria([
                            'id_kriteria' => $id_kriteria,
                            'id_kesesuaian' => $id_kesesuaian,
                            'range' => $range,
                            'loop' => $loop[$index][$id_kriteria][$id_kesesuaian]
                        ]);
                    }
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
        $tanaman = DataTanaman::findOrFail($tanaman->id);
        $kriteria = DataKriteria::all();
        $kesesuaian = DataKesesuaian::all();
        $subkriteria = DataSubkriteria::where('id_tanaman', $tanaman->id)->get();
        // penggunaan didalam view
        // dd($subkriteria->where('loop', 1)->where('id_kriteria', 1)->all());

        return view(
            'tanaman.edit',
            compact(['tanaman', 'kriteria', 'kesesuaian', 'subkriteria'])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataTanaman $tanaman)
    {
        // dd($request->all());
        // Validasi inputan untuk update
        $request->validate([
            'nama_tanaman' => 'required',
            'kriteria' => 'required',
        ]);

        // dd($tanaman);
        // // Ambil data tanaman berdasarkan ID
        // $tanamans = DataTanaman::findOrFail($tanaman->id);
        

        // 2. Siapkan data subkriteria
        $subkriteriaData = [];
        $loop = $request->input('loop');
        $id=$request->input('id');

        foreach ($request->input('kriteria') as $index => $kriteria) {
            foreach ($kriteria as $id_kriteria => $tingkatan) {
                foreach ($tingkatan as $id_kesesuaian => $range) {
                    if ($range == null) {
                        continue;
                    }else{
                        // $subkriteriaData[] = new DataSubkriteria([
                        //     'id' => $id[$index][$id_kriteria][$id_kesesuaian],
                        //     'id_kriteria' => $id_kriteria,
                        //     'id_kesesuaian' => $id_kesesuaian,
                        //     'range' => $range,
                        //     'loop' => $loop[$index][$id_kriteria][$id_kesesuaian]
                        // ]);
                        $subkriteriaData[] = [
                            'id' => $id[$index][$id_kriteria][$id_kesesuaian],
                            'id_kriteria' => $id_kriteria,
                            'id_kesesuaian' => $id_kesesuaian,
                            'id_tanaman' => $tanaman->id,
                            'range' => $range,
                            'loop' => $loop[$index][$id_kriteria][$id_kesesuaian]
                        ];
                    }
                }
            }
        }
        // dd($subkriteriaData);

        DB::transaction(function () use ($tanaman, $request, $subkriteriaData) {
            foreach ($subkriteriaData as $subkriteria) {
                DataSubkriteria::updateOrCreate(
                    [
                        'id' => $subkriteria['id'],
                    ],
                    [
                        'id_kriteria' => $subkriteria['id_kriteria'],
                        'id_kesesuaian' => $subkriteria['id_kesesuaian'],
                        'id_tanaman' => $subkriteria['id_tanaman'],
                        'range' => $subkriteria['range'],
                        'loop' => $subkriteria['loop'],
                    ]
                );
            }
            // Update data dengan inputan baru
            $tanaman->update(['nama_tanaman' => $request->nama_tanaman]);
        }, 5);

        // $tanaman->subkriteria()->updateOrCreate(
        //     [
        //         'id_kriteria' => $request->id_kriteria
        //     ],
        //     [
        //         'id_kriteria' => $request->id_kriteria,
        //         'id_kesesuaian' => $request->id_kesesuaian,
        //         'range' => $request->range,
        //     ]
        // );
        // $tanaman->subkriteria()->delete();
        // $tanaman->subkriteria()->saveMany($subkriteriaData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTanaman $tanaman)
    {
        // Ambil data tanaman berdasarkan ID dan hapus
        $tanaman = DataTanaman::findOrFail($tanaman->id);
        $tanaman->subkriteria()->delete();
        $tanaman->delete();
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil dihapus.');
    }

    public function destroyJSON($id_kriteria, $id_tanaman, $loop)
    {
        try {
            $subkriteria = DataSubkriteria::where('id_kriteria', $id_kriteria)->where('id_tanaman', $id_tanaman)->where('loop', $loop);
            $subkriteria->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }
}
