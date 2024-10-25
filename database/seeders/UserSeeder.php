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
        User::create([
            'nombre' => 'Gabriel Gonzales',
            'usuario' => '24902751',
            'estatus' => 'activo',
            'perfil' => 'CYA',
            'creado_por' => '24902751',
            'created_at' => now(),
            'clave' => md5('24902751'), // Asegúrate de encriptar la contraseña
        ]);
        User::create([
            'nombre' => 'Andres Cymo',
            'usuario' => '26996914',
            'estatus' => 'activo',
            'perfil' => 'CYA',
            'creado_por' => '26996914',
            'created_at' => now(),
            'clave' => md5('26996914'), // Asegúrate de encriptar la contraseña
        ]);

        //$data = collect(file('/var/www/html/conciliacion/public/storage/DataSeed/user.txt'));
        $data = collect(file('c:/laragon/www/conciliacion/public/storage/DataSeed/user.txt')); #for window laragon
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
