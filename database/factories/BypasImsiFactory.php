<?php

namespace Database\Factories;

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
            'usuario' => fake()->numerify('########'),
            'tipsim' => fake()->randomElement(['7340610', '7340630']),
            'restsim' => fake()->numerify('########'),
            'observaciones' => fake()->sentence(),
        ];

        $result['imsi'] = $result['tipsim'].$result['restsim'];

        unset($result['tipsim'], $result['restsim']);
        
        return $result;
    }
}
