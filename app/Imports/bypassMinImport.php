<?php

namespace App\Imports;

use App\Models\BypasMin;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class bypassMinImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {

        print_r($row);

        return new BypasMin([
            'ticket' => $row[0],
            'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
            'usuario' => auth()->user()->usuario,
            'min' => $row[1],
            'observaciones' => $row[3],
            'tcliente' => $row[2],
        ]);
    }

    public function rules(): array {
        return [
            'ticket' => 'required|numeric|min:10|max:10|starts_with:3900',
            'min' => 'required|numeric|min:10|max:10|regex:/^(426|416)/',
            'observaciones' => 'required|string',
            'tcliente' => 'required|string|min:7|max:8|in:PREPAGO,POSTPAGO',
        ];
    }
}
