<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImsiKi>
 */
class ImsiKiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'fecha' => fake()->dateTimeBetween('now', '+1 year'),
            'imsi' => '73406' . mt_rand(10, 30) . str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
            //'imsi' => '73406' . $this->faker->randomNumber(10),
            //
        ];
        
    }
}
