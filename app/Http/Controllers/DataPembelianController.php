<?php

namespace App\Http\Controllers;

use App\Models\DataPembelian;
use Illuminate\Http\Request;

class DataPembelianController extends Controller
{
    public function datapembelian(Request $request)
    {
        $data = DataPembelian::all();
        return view('datapembelian/datapembelian',compact('data'),[
        ]);
    }
}
