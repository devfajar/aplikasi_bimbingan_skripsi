<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Data fakultas yang akan di-seed
            $fakultas = [
                ['name' => 'Fakultas Teknik'],
                ['name' => 'Fakultas Ekonomi Dan Bisnis'],
                ['name' => 'Fakultas Ilmu Komputer'],
                ['name' => 'Fakultas Kedokteran'],
                ['name' => 'Fakultas Hukum'],
                ['name' => 'Fakultas Ilmu Sosial Dan Ilmu Politik'],
            ];
        
            // Lakukan seeding ke tabel fakultas
            Fakultas::insert($fakultas);
    }
}
