<?php

namespace App\Exports;

use App\Models\Incidencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Carbon\Carbon;

class IncidenciaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        // Obtener el primer día y el último día del mes actual
        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $lastDayOfMonth = Carbon::now()->endOfMonth();

        // Obtener las incidencias del mes actual
        return Incidencia::whereBetween('inicio', [$firstDayOfMonth, $lastDayOfMonth])
                         ->select('id', 'ticket', 'inicio', 'fin', 'descripcion', 'tipo', 'solicitante','responsable') // Selecciona las columnas 1-8
                         ->get();
        }

    public function headings(): array {
        return [
            'id',
            'ticket',
            'inicio',
            'fin',
            'descripcion',
            'tipo',
            'solicitante',
            'responsable',
        ];
    }
}
