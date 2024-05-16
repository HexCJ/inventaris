<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataBarangController extends Controller
{
    public function databarang(Request $request)
    {
        $role = Auth::user()->role;
        $data = DataBarang::all();
        return view('databarang/databarang',compact('data'),[
            'role' => $role,

        ]);
    }

    public function create(Request $request)
    {
        return view('databarang/databarangadd',[
        ]);
    }
}
