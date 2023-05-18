<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provinsi>
 */
class ProvinsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $head = fake()->numberBetween(1000 , 10000);
        $citizen = fake()->numberBetween(0 , $head);
        return [
            'name' => fake()->state,
            'no_citizen' => $head,
            'no_head_citizen' => $citizen,

        ];
    }
}
