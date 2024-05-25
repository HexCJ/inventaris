<?php

namespace App\Exports;

use App\Models\DataPembelian;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportPembelian implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data =  DataPembelian::select('kode_barang', 'nama_barang', 'merk', 'jenis_barang', 'tanggal_pembelian', 'jumlah', 'harga', 'total')->orderBy('kode_barang', 'asc')->get();
        return $data;
    }

    public function title(): string
    {
        return 'Data Pembelian';
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Merk',
            'Jenis Barang',
            'Tanggal Pembelian',
            'Jumlah',
            'Harga',
            'Total',
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
