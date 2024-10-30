<?php

namespace Database\Seeders; 
use App\Models\ImsiKi; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImsiKiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ImsiKi::factory(50)->create();
    }
}
