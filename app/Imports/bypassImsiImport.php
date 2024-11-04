<?php

namespace App\Imports;

use App\Models\BypasImsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class bypassImsiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {

        if (
            str_starts_with($row[0],'3900')
            && strlen($row[0]) == 10
            && str_contains($row[1], '73406')
            && strlen($row[1]) == 15
        ) {
            return new BypasImsi([
                'ticket' => $row[0],
                'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
                'usuario' => auth()->user()->usuario,
                'imsi' => $row[1],
                'observaciones' => $row[2],
            ]);
        }
    }
}
