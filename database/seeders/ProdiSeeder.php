<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data prodi yang akan di-seed
        $prodi = [
            ['name' => 'Teknik Sipil', 'fakultas_id' => 1],
            ['name' => 'Teknik Mesin', 'fakultas_id' => 1],
            ['name' => 'Teknik Elektro', 'fakultas_id' => 1],
            ['name' => 'Teknik Kimia', 'fakultas_id' => 1],
            ['name' => 'Teknik Industri', 'fakultas_id' => 1],
            ['name' => 'Teknik Perkapalan', 'fakultas_id' => 1],
            ['name' => 'Teknik Komputer', 'fakultas_id' => 1],
            ['name' => 'Teknik Lingkungan', 'fakultas_id' => 1],
            ['name' => 'Ilmu Manajemen', 'fakultas_id' => 2],
            ['name' => 'Ilmu Akuntansi', 'fakultas_id' => 2],
            ['name' => 'Ilmu Ekonomi Islam', 'fakultas_id' => 2],
            ['name' => 'Ilmu Ekonomi', 'fakultas_id' => 2],
            ['name' => 'Ilmu Komputer', 'fakultas_id' => 3],
            ['name' => 'Sistem Informasi', 'fakultas_id' => 3],
            ['name' => 'Kedokteran', 'fakultas_id' => 4],
            ['name' => 'Ilmu Hukum', 'fakultas_id' => 5],
            ['name' => 'Ilmu Komunikas', 'fakultas_id' => 6],
            ['name' => 'Ilmu Politik', 'fakultas_id' => 6],
            ['name' => 'Kriminologi', 'fakultas_id' => 6],
            ['name' => 'Sosiologi', 'fakultas_id' => 6],
            ['name' => 'Ilmu Hubungan Internasional', 'fakultas_id' => 6],
            ['name' => 'Antropologi Sosial', 'fakultas_id' => 6],
            ['name' => 'Ilmu Kesejahteraan Sosial', 'fakultas_id' => 6],
            // Tambahkan data prodi lainnya di sini
        ];

        // Lakukan seeding ke tabel prodi
        Prodi::insert($prodi);
    }
}
