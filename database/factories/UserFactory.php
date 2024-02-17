<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $result = [
            'nombre' => fake()->name(),
            'usuario' => fake()->numerify('########'),
            'estatus' => fake()->randomElement(['Suspendido', 'Iniciado', 'Activo']),
            'perfil' => fake()->randomElement(['SA', 'CYA']),
            'creado_por' => fake()->numerify('########'),
        ];

        $result['clave'] = md5($result['usuario']);
        
        return $result;
    }
}
