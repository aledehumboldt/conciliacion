<?php

namespace Database\Seeders;

use App\Models\aprovisionamientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AprovisionamientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        aprovisionamientos::factory(50)->create();
    }
}
