<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //User::factory(50)->create();
        //$data = collect(file('/var/www/html/conciliacion/public/storage/DataSeed/user.txt'));
        $data = collect(file('c:/laragon/www/conciliacion/public/storage/DataSeed/user.txt')); //for window laragon
        $line = " ";

        $data->each(function ($line) {
            $values = explode(' ', $line);
            
            User::create([
                'nombre' => str_replace('_',' ',$values[0]),
                'usuario' => $values[1],
                'estatus' => $values[2],
                'perfil' => $values[3],
                'creado_por' => $values[4],
                'created_at' => date("Y-m-d H:i:s", strtotime($values[5])),
                'clave' => $values[6]
             ]);
        });
    }
}
