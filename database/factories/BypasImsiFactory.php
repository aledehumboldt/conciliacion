<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BypasImsiFactory extends Factory
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
            'codarea' => fake()->randomElement(['7340610', '7340630']),
            'sim' => fake()->numerify('########'),
            'observaciones' => fake()->sentence(),
        ];

        $result['imsi'] = $result['codarea'].$result['sim'];

        unset($result['codarea'], $result['sim']);
        
        return $result;
    }
}
