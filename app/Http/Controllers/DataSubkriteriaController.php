<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKesesuaian;
use App\Models\DataSubkriteria;

class DataSubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subkriteria = DataSubkriteria::all();
        $tanaman = $subkriteria->pluck('tanaman')->unique();

        return view('subkriteria.index', compact('subkriteria', 'tanaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataSubkriteria $subkriterium)
    {
        //
    }

    public function detail($id_tanaman)
    {
        // $subkriteria = DataSubkriteria::all();
        $kesesuaian = DataKesesuaian::all();
        $subkriteria = DataSubkriteria::where('id_tanaman', $id_tanaman)->get();
        // Kelompokkan data berdasarkan nama_kriteria
        $kriteria =  $subkriteria->pluck('kriteria')->unique();;
        // dd($kriteria);
        return view('subkriteria.detail', compact(var_name: ['subkriteria','kesesuaian', 'kriteria']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataSubkriteria $dataSubkriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataSubkriteria $dataSubkriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataSubkriteria $dataSubkriteria)
    {
        //
    }
}
