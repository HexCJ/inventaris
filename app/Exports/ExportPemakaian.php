<?php

namespace App\Exports;

use App\Models\DataPemakaian;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportPemakaian implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data =  DataPemakaian::select('kode_barang', 'jumlah_pakai', 'tanggal_pemakaian', 'pemakai', 'ruang', 'keterangan')->orderBy('kode_barang', 'asc')->get();
        return $data;
    }

    public function title(): string
    {
        return 'Data Pemakaian';
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Jumlah Pemakaian',
            'Tanggal Pemakaian',
            'Pemakai',
            'Ruang',
            'Keterangan',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->getStyle('A:I')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
}
}
