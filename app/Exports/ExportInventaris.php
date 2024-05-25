<?php

namespace App\Exports;

use App\Models\DataBarang;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportInventaris implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataBarang::Leftjoin('data_pembelian','data_pembelian.kode_barang','=','data_barang.kode_barang')
        ->Leftjoin('data_pemakaian','data_pemakaian.kode_barang','=','data_barang.kode_barang')
        ->Leftjoin('users','users.name','=','data_pemakaian.pemakai')
        ->leftJoin('ruang','nama_ruang','=','data_pemakaian.ruang')
        ->select('data_barang.kode_barang','data_barang.jenis_barang','data_barang.jumlah',DB::raw("DATE_FORMAT(data_pembelian.created_at, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal_pemakaian as tanggal_pemakaian','users.name','ruang.nama_ruang')->get();
        return view('inventaris/inventaris',compact('data'),[
        ]);
    }
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Jenis Barang',
            'Jumlah Barang',
            'Tanggal Pembelian',
            'Tanggal Pemakaian',
            'Nama Pemakai',
            'Ruangan',        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
}
}
