<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rtb extends Model
{
    use HasFactory;

    protected $fillable = ['Min', 'Imsi', 'SimCard', 'Status', 'FechaActivacion', 'Plan', 'Nodo', 'TipoDispositivo'];
}
