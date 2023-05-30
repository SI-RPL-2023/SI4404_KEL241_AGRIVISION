<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NonFoodRequest>
 */
class NonFoodRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kecamatan = Kecamatan::inRandomOrder()->first();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'kecamatan_id' => $kecamatan->id ,
            'kota_id' => $kecamatan->kota->id,
            'provinsi_id' => $kecamatan->kota->provinsi->id,
            'place_code' => '0',
            'title' => fake()->company,
            'description' => fake()->text,
            'number' => fake()->randomNumber(),
            'status' => 'requested',
            'request_category' => 'food',
            'supported_document' => 'doc',
        ];
    }
}
