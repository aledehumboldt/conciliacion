<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IncidenciaFactory extends Factory
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
            'inicio' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'fin' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'descripcion' => fake()->sentence(),
            'solicitante' => fake()->randomElement(['CYA', 'Soporte de Averias'])
        ];
    }
}
