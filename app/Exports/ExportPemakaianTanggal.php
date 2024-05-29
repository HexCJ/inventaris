<?php

namespace App\Exports;

use App\Models\DataPemakaian;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExportPemakaianTanggal implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    protected $tanggal;

    // Constructor to accept the date parameter
    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $data = DataPemakaian::select('kode_barang', 'jumlah_pakai', 'tanggal_pemakaian', 'pemakai', 'ruang', 'keterangan')
            ->whereDate('tanggal_pemakaian', $this->tanggal)
            ->orderBy('kode_barang', 'asc')
            ->get();
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
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A:F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}

