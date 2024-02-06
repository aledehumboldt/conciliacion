<?php

namespace App\Imports;

use App\Models\BypasMin;
use Maatwebsite\Excel\Concerns\ToModel;

class bypassMinImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        return new BypasMin([
            'ticket' => $row[0],
            'fecha' => $row[1],
            'usuario' => $row[2],
            'min' => $row[3],
            'observaciones' => $row[4],
            'tcliente' => $row[5],
        ]);
    }
}
