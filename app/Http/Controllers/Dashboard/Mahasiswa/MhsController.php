<?php

namespace App\Http\Controllers\Dashboard\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkripsiResource;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'dosen_pembimbing_id' => 'required|exists:dosen,id',
            'judul' => 'required|string',
        ]);

        $pengajuanSkripsi = Skripsi::create([
            'mahasiswa_id' => $request->input('mahasiswa_id'),
            'dosen_pembimbing_id' => $request->input('dosen_pembimbing_id'),
            'judul' => $request->input('judul'),
            'status' => 'proses',
        ]);

        return new SkripsiResource($pengajuanSkripsi);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
