<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wasabi_id = OptionCategory::where('name', 'サビ')->first()->value('id');
        $size_id = OptionCategory::where('name', 'サイズ')->first()->value('id');

        Option::create([
            'option_category_id' => $wasabi_id,
            'name' => '有り'
        ]);

        Option::create([
            'option_category_id' => $wasabi_id,
            'name' => '無し'
        ]);

        Option::create([
            'option_category_id' => $size_id,
            'name' => '並'
        ]);

        Option::create([
            'option_category_id' => $size_id,
            'name' => '特大'
        ]);
    }
}
