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

                'item_name' => 'Kertas HVS',
                'brand' => 'Sinar Dunia',
                'total_stock' => '20',
                'category_id' => 1,

            ]
            ];
        Item::insert($item);
    }
}
