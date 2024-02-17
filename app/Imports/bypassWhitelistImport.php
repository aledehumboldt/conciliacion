<?php

namespace App\Imports;

use App\Models\BypasWhitelist;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class bypassWhitelistImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        return new BypasWhitelist([
            'ticket' => $row[0],
            'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
            'usuario' => auth()->user()->usuario,
            'min' => $row[1],
            'observaciones' => $row[2],
        ]);
    }
}
