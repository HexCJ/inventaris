<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function inventaris(Request $request)
    {
        $data = Inventaris::all();
        return view('inventaris/inventaris',compact('data'),[
        ]);
    }
}
