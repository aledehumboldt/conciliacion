<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprovisionamiento extends Model
{
    use HasFactory;

    protected $fillable = ['ticket', 'celular', 'imsi', 'fecha', 'tcliente', 'codacc', 'usuario', 'observaciones'];
}
