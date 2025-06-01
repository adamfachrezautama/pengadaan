<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Peralatan Elektronik',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Perabotan Kantor',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Peralatan Kebersihan',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Peralatan Pantry',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Perlengkapan Operasional',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Peralatan Keamanan',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'keterangan' => 'Alat Perbaikan',
                'created_at' => now(),
            ],
        ];

        Category::insert($categories);

    }
}
