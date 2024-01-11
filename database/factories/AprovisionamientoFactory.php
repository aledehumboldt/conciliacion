<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aprovisionamiento>
 */
class AprovisionamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
     $result = [
            'ticket' => fake()->numerify('##########'),
            'codarea' => fake()->randomElement(['416', '426']),
            'numero' => fake()->numerify('#######'),
            'tipsim' => fake()->randomElement(['7340610', '7340630']),
            'restsim' => fake()->numerify('########'),
            'fecha' => fake()->dateTimeBetween('now', '+1 year'),
            'tcliente' => fake()->randomElement(['POSTPAGO','PREPAGO']),
            'codacc' => fake()->randomElement(['ACTPRVHLR','POGCANVHLR']),
            'usuario' => fake()->numerify('########'),
            'observaciones' => fake()->sentence()
            
        ];

        $result['celular'] = $result['codarea'].$result['numero'];
        $result['imsi'] = $result['tipsim'].$result['restsim'];

        unset($result['codarea'], $result['numero'], $result['tipsim'], $result['restsim']);
        
        return $result;

    }
}
