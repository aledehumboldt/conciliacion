<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BypasWhitelistFactory extends Factory
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
            'fecha' => fake()->dateTimeBetween('now', '+1 year'),
            'usuario' => fake()->numerify('########'),
            'codarea' => fake()->randomElement(['416', '426']),
            'numero' => fake()->numerify('########'),
            'observaciones' => fake()->sentence(),
        ];

        $result['min'] = $result['codarea'].$result['numero'];

        unset($result['codarea'], $result['numero']);
        
        return $result;
    }
}
