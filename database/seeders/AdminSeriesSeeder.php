<?php

namespace Database\Seeders;

use App\Models\AdminSerie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdminSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
       //$data = collect(file('/var/www/html/conciliacion/public/storage/file.txt'));
        $data = collect(file('c:/laragon/www/conciliacion/public/storage/file.txt')); //for window laragon
        $line = " ";

        $data->each(function ($line) {
            $values = explode(' ', $line);
            
            AdminSerie::create([
                'prefijo' => $values[0],
                'apollo1' => $values[1],
                'apollo2' => $values[2],
                'plataforma' => $values[3],
                'area' => $values[4],
                'inicio' => $values[5],
                'fin' => $values[6],
                'codcentral' => $values[7],
                'tecliente' => $values[8],
                'central' => $values[9],
             ]);
        });

    }
}
