<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\PriceHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sushi_id = Category::where('name', '寿司')->first()->value('id');
        $sushi_price_id = PriceHistory::where('price', '200')->first()->value('id');
        $drink_id = Category::where('name', 'ドリンク')->first()->value('id');
        $drink_price_id = PriceHistory::where('price', '300')->first()->value('id');

        Item::create([
            'category_id' => $sushi_id,
            'price_history_id' => $sushi_price_id,
            'name' => 'まぐろ'
        ]);

        Item::create([
            'category_id' => $sushi_id,
            'price_history_id' => $sushi_price_id,
            'name' => 'さけ'
        ]);

        Item::create([
            'category_id' => $drink_id,
            'price_history_id' => $drink_price_id,
            'name' => 'りんごジュース'
        ]);
    }
}
