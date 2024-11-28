<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ticket',
        'inicio',
        'fin',
        'descripcion',
        'tipo',
        'solicitante',
        'responsable',
    ];

    public function user() {
     return $this->belongsTo(User::class, 'responsable', 'usuario');
    }
}
