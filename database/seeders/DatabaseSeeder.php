<?php

namespace Database\Seeders;

use App\Models\Bypas;
use Database\Factories\IncidenciaFactory;
use Database\Seeders\ExclusioneSeeder;
use Database\Seeders\BypasSeeder;
use Database\Seeders\IncidenciaSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ExclusioneSeeder::class,
            UserSeeder::class,
            BypasSeeder::class,
            IncidenciaSeeder::class
        ]);
    }
}
