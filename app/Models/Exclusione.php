<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclusione extends Model {
    use HasFactory;

    protected $fillable = ['ticket', 'celular', 'fechae', 'fechac', 'tcliente', 'usuario', 'observaciones'];
}
