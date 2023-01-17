<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PriceHistory;
use Illuminate\Database\Seeder;

class PriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceHistory::create([
            'price' => 200,
        ]);

        PriceHistory::create([
            'price' => 300,
        ]);
    }
}
