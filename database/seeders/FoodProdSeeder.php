<?php

namespace Database\Seeders;

use App\Models\FoodProduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodProduction::factory()->count(5)->create();
    }
}
