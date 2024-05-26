<?php

namespace App\Http\Controllers;

use App\Exports\ExportMulti;
use App\Models\DataBarang;
use App\Models\DataPemakaian;
use App\Models\DataPembelian;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $datapemakaian = DataPemakaian::join('data_barang', 'data_barang.kode_barang', '=', 'data_pemakaian.kode_barang')
        ->select(
        'data_pemakaian.id',
        'data_pemakaian.kode_barang',
        'data_pemakaian.jumlah_pakai',
        'data_pemakaian.ruang',
        'data_pemakaian.tanggal_pemakaian',
        'data_pemakaian.pemakai',
        'data_pemakaian.keterangan',
        'data_barang.nama_barang'  // Mengambil nama barang dari tabel data_barang
        )->paginate(5);

        $datapembelian = DataPembelian::paginate(5);

        $role = Auth::user()->role;
        $username = Auth::user()->username;
        $databarangall = DataBarang::count();
        $datauserall = User::count();
        $datapembelianall = DataPembelian::count();
        $datapemakaianall = DataPemakaian::count();
        $dataruangall = Ruang::count();
        $name = Auth::user()->name;
        $user = User::where('username', $username)->first();
        return view('/dashboard',[
            'role' => $role,
            'username' => $username,
            'name' => $name,
            'user' => $user,
            'databarangall' => $databarangall,
            'datauserall' => $datauserall,
            'datapembelianall' => $datapembelianall,
            'datapemakaianall' => $datapemakaianall,
            'dataruangall' => $dataruangall,
            'datapemakaian' => $datapemakaian,
            'datapembelian' => $datapembelian,
        ]);
    }

    public function navbar()
    {
        $username = Auth::user()->username;
        $user = User::where('username', $username)->first();
        return view('/navbar', [
            'user' => $user
        ]);

    }

    public function export(){
        return Excel::download(new ExportMulti, "Laporan.xlsx");
    }
}
