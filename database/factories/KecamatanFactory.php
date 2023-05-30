<?php

namespace Database\Factories;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kecamatan>
 */
class KecamatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $head = fake()->numberBetween(10 , 100);
        $citizen = fake()->numberBetween(0 , $head);

        return [
            'name' => fake()->streetName,
            'kota_id' => Kota::inRandomOrder()->first()->id,
            'no_citizen' => $head,
            'no_head_citizen' => $citizen,
        ];
    }
}
