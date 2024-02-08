<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Facades\CSV;

class AdminSerie extends Model
{
    use HasFactory;

    protected $fillable = ['prefijo', 'apollo1','apollo2','plataforma','area','inicio','fin','codcentral','tecliente','central'];

    public function import($filepatch){
        $users = CSV::read($filepatch, ';');

        foreach ($users as $user){
            $this->create([
                'prefijo' => $user[1],
                'apollo1' => $user[2],
                'apollo2' => $user[3],
                'plataforma' => $user[4],
                'area' => $user[5],
                'inicio' => $user[6],
                'fin' => $user[7],
                'codcentral' => $user[8],
                'tecliente' => $user[9],
                'central' => $user[10],
            ]);
        }
    }
};
