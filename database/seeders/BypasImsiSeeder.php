<?php

namespace Database\Seeders;

use App\Models\BypasImsi;
use Database\Factories\BypasImsiFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BypasImsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BypasImsi::factory(50)->create();
    }
}
