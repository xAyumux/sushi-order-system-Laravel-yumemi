<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\OptionCategory;
use Illuminate\Database\Seeder;

class OptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OptionCategory::create([
            'name' => 'サビ',
        ]);

        OptionCategory::create([
            'name' => 'サイズ',
        ]);

        OptionCategory::create([
            'name' => 'トッピング',
        ]);
    }
}
