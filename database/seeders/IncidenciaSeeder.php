<?php

namespace Database\Seeders;

use Database\Factories\IncidenciaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IncidenciaFactory::factory(50)->create();
    }
}
