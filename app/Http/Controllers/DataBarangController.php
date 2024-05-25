<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Exports\ExportBarang;
use App\Models\DataPemakaian;
use App\Models\DataPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class DataBarangController extends Controller
{
    public function databarang(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataBarang::paginate(5);
        return view('databarang/databarang',compact('data'),[
            'role' => $role,

        ]);
    }

    public function export(){
        return Excel::download(new ExportBarang, "barang.xlsx");
    }

    public function create(Request $request)
    {
        return view('databarang/databarangadd',[
        ]);
    }

    public function destroy($id)
    {
        //
        $data = DataBarang::findOrFail($id);
        $nama_barang = $data->id;
        $kodebar =  $data->kode_barang;
        $pembelian = DataPembelian::where('kode_barang', $kodebar)->first();
        $pemakaian = DataPemakaian::where('kode_barang', $kodebar)->first();
        $pembelian->delete();
        if($pemakaian){
            $pemakaian->delete();
        }
        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Barang '.$nama_barang.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Barang gagal '.$nama_barang.' dihapus');
        }
    }
}
