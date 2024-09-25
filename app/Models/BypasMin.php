<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BypasMin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ticket',
        'fecha',
        'usuario',
        'min',
        'observaciones',
        'tcliente',
    ];
}
