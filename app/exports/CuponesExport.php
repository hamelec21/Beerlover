<?php
namespace App\Exports;

use App\Models\Cupon;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CuponesExport implements FromCollection, WithHeadings, WithMapping,WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cupon::withCount('users')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nombre Campaña',
            'Codigo Cupon',
            'Cupones Usados',
            'Fecha Creación'
            // Agrega otros campos aquí si es necesario
        ];
    }

    /**
     * @param \App\Models\Cupon $cupon
     * @return array
     */
    public function map($cupon): array
    {
        return [
            $cupon->id,
            $cupon->nombre,
            $cupon->codigo,
            $cupon->users_count ? $cupon->users_count : '0', // Obtenemos el nombre del estado
            Carbon::parse($cupon->created_at)->format('d/m/Y'), // Formato de fecha
            // Mapea otros campos aquí si es necesario
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Ajustar el ancho de las columnas basado en el ancho de los encabezados
                foreach ($this->headings() as $columnIndex => $heading) {
                    $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnIndex + 1);
                    $sheet->getColumnDimension($columnLetter)->setAutoSize(true);

                    // Alternativamente, puedes establecer un ancho fijo basado en la longitud del encabezado
                    $sheet->getColumnDimension($columnLetter)->setWidth(strlen($heading) + 2); // +2 for padding
                }
            },
        ];
    }
}
