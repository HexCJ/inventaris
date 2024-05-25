<?php

namespace App\Exports;

use App\Models\Ruang;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRuang implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data =  Ruang::select('nama_ruang')->orderBy('nama_ruang', 'asc')->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'Nama Ruangan',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:B1')->getFont()->setBold(true);
        $sheet->getStyle('A:B')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'B') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
}
}
