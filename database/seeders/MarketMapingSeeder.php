<?php

namespace Database\Seeders;

use App\Models\MarketMaping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketMapingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketMaping::factory()->count(10)->create();
    }
}
