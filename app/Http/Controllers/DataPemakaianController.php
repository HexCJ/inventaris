<?php

namespace App\Http\Controllers;

use App\Models\DataPemakaian;
use Illuminate\Http\Request;

class DataPemakaianController extends Controller
{
    public function datapemakaian(Request $request)
    {
        $data = DataPemakaian::all();
        return view('datapemakaian/datapemakaian',compact('data'),[
        ]);
    }
}
