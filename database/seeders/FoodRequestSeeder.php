<?php

namespace Database\Seeders;

use App\Models\FoodRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodRequest::factory()->count(10)->create();
    }
}
