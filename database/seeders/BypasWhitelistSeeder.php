<?php

namespace Database\Seeders;

use App\Models\BypasWhitelist;
use Database\Factories\BypasWhitelistFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BypasWhitelistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BypasWhitelist::factory(50)->create();
    }
}
