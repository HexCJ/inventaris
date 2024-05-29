<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportPemakaianTanggal;
use Maatwebsite\Excel\Facades\Excel;


class PemakaianTanggal extends Controller
{   
    public function exportt(Request $request)
    {
        $tanggal = $request->input('tanggal'); // Ambil tanggal dari input request
        return Excel::download(new ExportPemakaianTanggal($tanggal), 'datapemakaiantgl.xlsx');
    }
    //
}
