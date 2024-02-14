<?php

namespace App\Imports;

use App\Models\BypasMin;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bypassMinImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {

        if (str_contains($row[2], '73406')) {
            return new BypasMin([
                'ticket' => $row[0],
                'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
                'usuario' => auth()->user()->usuario,
                'min' => $row[1],
                'observaciones' => $row[4],
                'tcliente' => $row[3],
            ]);
        }
            return new BypasMin([
                'ticket' => $row[0],
                'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
                'usuario' => auth()->user()->usuario,
                'min' => $row[1],
                'observaciones' => $row[3],
                'tcliente' => $row[2],
        ]);
    }
}
