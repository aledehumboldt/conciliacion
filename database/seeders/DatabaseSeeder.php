<?php

namespace Database\Seeders;

use App\Models\BypasImsi;
use App\Models\BypasMin;
use App\Models\BypasWhitelist;
use App\Models\aprovisionamientos;
use Database\Factories\IncidenciaFactory;
use Database\Factories\BypasMinFactory;
use Database\Factories\BypasImsiFactory;
use Database\Factories\BypasWhitelistFactory;
use Database\Factories\AprovisionamientosFactory;
use Database\Seeders\ExclusioneSeeder;
use Database\Seeders\BypasMinSeeder;
use Database\Seeders\BypasImsiSeeder;
use Database\Seeders\BypasWhitelistSeeder;
use Database\Seeders\IncidenciaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AprovisionamientosSeeder;
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
            AprovisionamientosSeeder::class,
        ]);
    }
}
