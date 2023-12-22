<?php

namespace Database\Seeders;

use App\Models\BypasMin;
use Database\Factories\BypasMinFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BypasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BypasMin::factory(50)->create();
    }
}
