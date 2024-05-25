<?php

namespace App\Exports;

use App\Models\DataBarang;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportBarang implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data =  DataBarang::select('kode_barang', 'nama_barang', 'jenis_barang', 'jumlah', 'harga',)->orderBy('kode_barang', 'asc')->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Jenis Barang',
            'Jumlah',
            'Harga',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A:F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
}
}
