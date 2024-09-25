<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array {
        $result = [
            'ticket' => fake()->numerify('##########'),
            'fecha' => fake()->dateTimeBetween('now', '+1 year'),
            'usuario' => User::inRandomOrder()->first()->usuario,
            'codarea' => fake()->randomElement(['416', '426']),
            'numero' => fake()->numerify('#######'),
            'observaciones' => fake()->sentence(),
        ];

        $result['min'] = $result['codarea'].$result['numero'];

        unset($result['codarea'], $result['numero']);
        
        return $result;
    }
}
