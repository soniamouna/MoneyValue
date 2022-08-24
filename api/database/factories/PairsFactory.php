<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pairs>
 */
class PairsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'from'=>$this->faker->currencyCode(),
            'to'=>$this->faker->currencyCode(),
            'count'=>0,
            'rate'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 0),
        ];
    }
}
