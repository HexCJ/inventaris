<?php

namespace App\Exports;

use App\Models\DataPemakaian;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportPemakaian implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data =  DataPemakaian::select('kode_barang', 'jumlah_pakai', 'tanggal_pemakaian', 'pemakaian', 'keterangan')->orderBy('kode_barang', 'asc')->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Jumlah Pemakaian',
            'Tanggal Pemakaian',
            'Pemakaian',
            'Keterangan',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
}
}
