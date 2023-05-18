<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AgriMaping;
use App\Models\FoodCategory;
use App\Models\FoodRequest;
use App\Models\Kecamatan;
use App\Models\MarketMaping;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
           ProvisniSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            FoodSeeder::class,
            FoodProdSeeder::class,
            MarketMapingSeeder::class,
            AgriMapingSeeder::class,
            FoodRequestSeeder::class,
        ]);
    }
}
