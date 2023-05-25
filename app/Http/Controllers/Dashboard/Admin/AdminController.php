<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createDosen(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'nidn' => 'required|numeric',
                'fakultas_id' => 'required|exists:fakultas,id',
                'prodi_id' => 'required|exists:prodi,id',
            ]);
    
            $userData = $request->only(['name', 'email']);
            $userData['password'] = Hash::make($request->input('password'));
    
            DB::beginTransaction();
    
            $user = User::create($userData);
    
            if (!$user) {
                throw new \Exception('Failed to create user.');
            }
    
            $dosenData = [
                'user_id' => $user->id,
                'nidn' => $request->input('nidn'),
                'fakultas_id' => $request->input('fakultas_id'),
                'prodi_id' => $request->input('prodi_id'),
            ];
    
            $dosen = Dosen::create($dosenData);
    
            if (!$dosen) {
                throw new \Exception('Failed to create dosen.');
            }
    
            $role = Role::where('name', 'Dosen')->first();
    
            if (!$role) {
                throw new \Exception('Role Dosen not found.');
            }
    
            $user->assignRole($role);
    
            DB::commit();

            $user->load('dosen');
    
            return new UserResource($user);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createMahasiswa(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'nim' => 'required|numeric',
                'angkatan' => 'required|numeric',
                'fakultas_id' => 'required|exists:fakultas,id',
                'prodi_id' => 'required|exists:prodi,id',
            ]);
    
            $userData = $request->only(['name', 'email']);
            $userData['password'] = Hash::make($request->input('password'));
    
            DB::beginTransaction();
    
            $user = User::create($userData);
    
            if (!$user) {
                throw new \Exception('Failed to create user.');
            }
    
            $mahasiswaData = [
                'user_id' => $user->id,
                'nim' => $request->input('nim'),
                'angkatan' => $request->input('angkatan'),
                'fakultas_id' => $request->input('fakultas_id'),
                'prodi_id' => $request->input('prodi_id'),
            ];
    
            $mahasiswa = Mahasiswa::create($mahasiswaData);
    
            if (!$mahasiswa) {
                throw new \Exception('Failed to create mahasiswa.');
            }
    
            $role = Role::where('name', 'Mahasiswa')->first();
    
            if (!$role) {
                throw new \Exception('Role Mahasiswa not found.');
            }
    
            $user->assignRole($role);
    
            DB::commit();

            $user->load('mahasiswa');
    
            return new UserResource($user);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
