<?php

namespace Database\Seeders;

use App\Models\ItemDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $itemDetails = [
            [
                'id' => (string)Str::uuid(),
                'item_id' => '9a41c1ee-ecd8-411c-8a46-092b1b0562dc',
                'status' => 'available',
                'description' => 'kertas ukuran a4 sebanyak 1 rim'
            ]
        ];

        ItemDetail::insert($itemDetails);
    }
}
