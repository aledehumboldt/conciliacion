<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BypasWhitelist extends Model
{
    use HasFactory;

    protected $fillable = ['ticket', 'fecha', 'usuario', 'min', 'observaciones'];
}
