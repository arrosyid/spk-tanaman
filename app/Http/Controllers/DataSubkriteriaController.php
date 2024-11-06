<?php

namespace App\Http\Controllers;

use App\Models\DataSubkriteria;
use App\Models\DataTanaman;
use Illuminate\Http\Request;

class DataSubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subkriteria = DataSubkriteria::with('tanaman')->get();

        return view('subkriteria.index', compact('subkriteria'));
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
    public function show(DataSubkriteria $dataSubkriteria)
    {
        //
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
