<?php

namespace Database\Factories;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kota>
 */
class KotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $head = fake()->numberBetween(100 , 1000);
        $citizen = fake()->numberBetween(0 , $head);
        return [

                'name' => fake()->city,
                'provinsi_id' => Provinsi::inRandomOrder()->first()->id,
                'no_citizen' => $head,
                'no_head_citizen' => $citizen,


        ];
    }
}
