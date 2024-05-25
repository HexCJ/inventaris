<?php

namespace App\Http\Controllers;

use App\Exports\ExportInventaris;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventarisController extends Controller
{
    public function inventaris(Request $request)
    {
        // $data = Inventaris::all();
        $data = DataBarang::Leftjoin('data_pembelian','data_pembelian.kode_barang','=','data_barang.kode_barang')
        ->Leftjoin('data_pemakaian','data_pemakaian.kode_barang','=','data_barang.kode_barang')
        ->Leftjoin('users','users.name','=','data_pemakaian.pemakai')
        ->leftJoin('ruang','nama_ruang','=','data_pemakaian.ruang')
        ->select('data_barang.kode_barang','data_barang.jenis_barang','data_barang.jumlah',DB::raw("DATE_FORMAT(data_pembelian.tanggal_pembelian, '%Y-%m-%d') as tanggal_pembelian"),'data_pemakaian.tanggal_pemakaian as tanggal_pemakaian','users.name','ruang.nama_ruang')->paginate(5);
        return view('inventaris/inventaris',compact('data'),[
        ]);
    }

    public function export(){
        return Excel::download(new ExportInventaris, "inventaris.xlsx");
    }
}
