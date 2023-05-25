<?php

namespace App\Http\Controllers\Dashboard\Dosen;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkripsiResource;
use App\Models\Skripsi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Skripsi::where('dosen_pembimbing_id', auth()->user()->dosen->id)->get();

        $data->load('mahasiswa.user', 'dosen.user');

        return SkripsiResource::collection($data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
