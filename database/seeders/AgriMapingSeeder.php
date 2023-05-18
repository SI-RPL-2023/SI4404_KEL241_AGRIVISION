<?php

namespace Database\Seeders;

use App\Models\AgriMaping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgriMapingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgriMaping::factory()->count(20)->create();
    }
}
