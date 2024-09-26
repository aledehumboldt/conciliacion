<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImsiKi extends Model
{
    use HasFactory;

    protected $fillable = ['imsi','fecha'];
   
}
