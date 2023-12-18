<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BypasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket' => fake()->numerify('##########'),
            'min' => fake()->numerify('##########'),
            'imsi' => fake()->numerify('########'),
            'accion' => fake()->numerify('########'),
            'usuario' => fake()->numerify('########'),
            'tcliente' => fake()->randomElement(['POSTPAGO','PREPAGO']),
            'observaciones' => fake()->sentence(),
        ];
    }
}
