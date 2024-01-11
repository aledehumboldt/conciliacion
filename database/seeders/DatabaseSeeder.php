<?php

namespace Database\Seeders;

use Database\Seeders\ExclusioneSeeder;
use Database\Seeders\BypasMinSeeder;
use Database\Seeders\BypasImsiSeeder;
use Database\Seeders\BypasWhitelistSeeder;
use Database\Seeders\IncidenciaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AprovisionamientoSeeder;
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
            IncidenciaSeeder::class,
            BypasMinSeeder::class,
            BypasImsiSeeder::class,
            BypasWhitelistSeeder::class,
            AprovisionamientoSeeder::class,
        ]);
    }
}
