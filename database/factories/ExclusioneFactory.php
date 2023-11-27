<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exclusione>
 */
class ExclusioneFactory extends Factory
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
            'fechae' => fake()->dateTimeBetween('now', '+1 year'),
            'fechac' => now(),
            'usuario' => fake()->numerify('########'),
            'celular' => fake()->numerify('##########'),
            'observaciones' => fake()->sentence(),
            'tecnologia' => fake()->randomElement(['GSM', 'CDMA']),
            'fecham' => now(),
            'tcliente' => fake()->randomElement(['POSTPAGO','PREPAGO'])
        ];
    }
}
