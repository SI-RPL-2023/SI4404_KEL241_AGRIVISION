<?php

namespace Database\Seeders;

use App\Models\NonFoodRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NonFoodRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NonFoodRequest::factory()->count(10)->create();
    }
}
