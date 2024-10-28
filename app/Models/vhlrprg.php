<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vhlrprg extends Model
{
    use HasFactory;
    protected $fillable = [
        'MSISDN',
        'IMSI',
        'CAT',
        'CURRENTNAM',
        'LOCK',
        'ODBIC',
        'TBS',
        'ODBOC',
        'ODBROAM',
        'OCSI',
        'TCSI',
        'GRPSCSI',
        'EPSPROFILEID',
    ];
}
