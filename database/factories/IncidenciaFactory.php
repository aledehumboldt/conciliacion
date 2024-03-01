<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array {
        return [
            'ticket' => fake()->numerify('##########'),
            'inicio' => fake()->dateTimeBetween('now', '+1 year'),
            'fin' => fake()->dateTimeBetween('now', '+1 year'),
            'descripcion' => fake()->sentence(),
            'tipo' => fake()->randomElement(['incidencia', 'requerimiento']),
            'solicitante' => fake()->randomElement(['CYA', 'Soporte de Averias']),
            'responsable' => User::inRandomOrder()->first()->usuario
        ];
    }
}
