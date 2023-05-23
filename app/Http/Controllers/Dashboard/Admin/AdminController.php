<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createDosen(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'nidn' => 'required|numeric',
            'fakultas_id' => 'required|exists:fakultas,id',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'Dosen',
        ]);

        // Create Dosen
        $dosen = Dosen::create([
            'user_id' => $user->id,
            'nidn' => $request->input('nidn'),
            'fakultas_id' => $request->input('fakultas_id'),
            'prodi_id' => $request->input('prodi_id'),
        ]);

        return new UserResource($user);
    }

    public function createMahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'nim' => 'required|numeric',
            'angkatan' => 'required|numeric',
            'fakultas_id' => 'required|exists:fakultas,id',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'Mahasiswa',
        ]);

        // Create Mahasiswa
        $mahasiswa = Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
            'fakultas_id' => $request->input('fakultas_id'),
            'prodi_id' => $request->input('prodi_id'),
        ]);

        return new UserResource($user);
    }
}
