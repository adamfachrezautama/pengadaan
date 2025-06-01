<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $departments =[
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'IT',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'HRD',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'Logistik',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'Keuangan',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'Marketing',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'Operasional',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'nama_departement' => 'Produksi',
                'created_at' => now(),
            ],
        ];
    }
}
