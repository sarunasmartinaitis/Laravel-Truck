<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TruckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_number' => $this->faker->unique()->bothify('##??##'), // Will create random string like 12AB34
            'year' => $this->faker->numberBetween($min = 1900, $max = now()->year + 5), // Random year between 1900 and current year + 5
            'notes' => $this->faker->realText($maxNbChars = 200, $indexSize = 2), // Random text
        ];
    }
}
