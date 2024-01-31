<?php

namespace Database\Seeders;

use App\Models\BypasMin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BypasMinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        BypasMin::factory(50)->create();
    }
}
