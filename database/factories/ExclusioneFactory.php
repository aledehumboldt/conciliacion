<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array {
        $result = [
            'ticket' => fake()->numerify('##########'),
            'fechae' => fake()->dateTimeBetween('now', '+1 year')->format('Ymd'),
            'fechac' => now(),
            'usuario' => User::inRandomOrder()->first()->usuario,
            'codarea' => fake()->randomElement(['416', '426']),
            'numero' => fake()->numerify('#######'),
            'observaciones' => fake()->sentence(),
            'tecnologia' => fake()->randomElement(['GSM', 'CDMA']),
            'tcliente' => fake()->randomElement(['POSTPAGO','PREPAGO'])
        ];

        $result['celular'] = $result['codarea'].$result['numero'];

        unset($result['codarea'], $result['numero']);
        
        return $result;
    }
}
