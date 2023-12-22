<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BypasImsi extends Model
{
    use HasFactory;

    protected $fillable = ['ticket', 'fecha', 'usuario', 'imsi', 'observaciones'];
}
