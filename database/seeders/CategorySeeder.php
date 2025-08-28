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

                'description' => 'peralatan elektronik',
                'created_at' => now(),
            ],
            [

                'description' => 'Perabotan Kantor',
                'created_at' => now(),
            ],
            [

                'description' => 'Peralatan Kebersihan',
                'created_at' => now(),
            ],
            [

                'description' => 'Peralatan Pantry',
                'created_at' => now(),
            ],
            [

                'description' => 'Perlengkapan Operasional',
                'created_at' => now(),
            ],
            [

                'description' => 'Peralatan Keamanan',
                'created_at' => now(),
            ],
            [

                'description' => 'Alat Perbaikan',
                'created_at' => now(),
            ],
        ];

        Category::insert($categories);

    }
}
