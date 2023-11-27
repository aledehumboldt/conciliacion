<?php

namespace Database\Seeders;

use App\Models\Exclusione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExclusioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exclusione::factory(50)->create();
    }
}
