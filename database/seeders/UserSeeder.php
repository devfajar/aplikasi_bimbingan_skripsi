<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            ]);
        
        $user->assignRole('Admin');
        
        $user = User::create([
                'name' => 'Dosen',
                'email' => 'dosen@dosen.com',
                'password' => Hash::make('dosen')
            ]);
        
        $user->assignRole('Dosen');
        
        $user = User::create([
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@skripsi.com',
                'password' => Hash::make('mahasiswa')
            ]);
        
        $user->assignRole('Mahasiswa');
    }
}
