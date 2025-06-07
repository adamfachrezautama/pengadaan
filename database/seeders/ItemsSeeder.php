<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $item = [
            [
                'id' => (string)Str::uuid(),
                'item_name' => 'Kertas HVS',
                'brand' => 'Sinar Dunia',
                'total_stock' => '20',
                'category_id' => '053a0b0b-89a2-4a50-843b-0e2b4a776abf',

            ]
            ];
        Item::insert($item);
    }
}
