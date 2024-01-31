<?php

namespace Database\Seeders;

use App\Models\Aprovisionamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AprovisionamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Aprovisionamiento::factory(50)->create();
    }
}
