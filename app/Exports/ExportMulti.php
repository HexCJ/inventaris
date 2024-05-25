<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExportMulti implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
     return[
        "Data User" => new ExportUser(),
        "Data Ruang" => new ExportRuang(),
        "Data Barang" => new ExportBarang(),
        "Data Pembelian" => new ExportPembelian(),
        "Data Pemakaian" => new ExportPemakaian(),
     ];  
    }
}
