<?php

namespace Database\Seeders;

use App\Models\Bypas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BypasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bypas::factory(50)->create();
    }
}
