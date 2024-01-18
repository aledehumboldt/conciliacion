<?php

namespace App\Exports;

use App\Models\Incidencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncidenciaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        return Incidencia::all();
    }

    public function headings(): array {
        return [
            'id',
            'ticket',
            'incicio',
            'fin',
            'descripcion',
            'solicitante',
        ];
    }
}
