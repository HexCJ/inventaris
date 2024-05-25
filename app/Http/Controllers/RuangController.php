<?php

namespace App\Http\Controllers;

use App\Models\DataPemakaian;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportRuang;


class RuangController extends Controller
{
    public function index(Request $request)
    {
        $data = Ruang::all();
        return view('ruang/ruang',compact('data'),[
        ]);
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        // ]);
        //jika valid gagal
        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        
        $data['nama_ruang']            = $request->nama_ruang;
        
        // create
        if($ruang = Ruang::create($data)){
            return redirect()->route('ruang')->with('success', 'Data Pembelian berhasil ditambahkan');
        }else{
            return redirect()->route('ruang')->with('fail', 'Data Pembelian gagal ditambahkan');
        }
    }

    public function update(Request $request,$id)
    {
        // $validator = Validator::make($request->all(),[        
        // ]);
    
        // if($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }
        $data = Ruang::find($id);
        $datapemakaian = DataPemakaian::where('ruang', $data->nama_ruang)->first();
        $data->nama_ruang = $request->nama_ruang;

        if($data->save()){
            if($datapemakaian){
                $datapemakaian->ruang = $data->nama_ruang; 
                $datapemakaian->save();
                return redirect()->route('ruang')->with('success-update', 'Data Pembelian berhasil diedit');        
            }
            
            return redirect()->route('ruang')->with('success-update', 'Data Pembelian berhasil diedit');        
        }
        else{
            return redirect()->route('ruang')->with('fail', 'Data Pembelian gagal diedit');
        }
    }

    public function export(){
        return Excel::download(new ExportRuang, "ruang.xlsx");
    }

    public function destroy($id)
    {
        //
        $data = Ruang::findOrFail($id);
        $nama_ruang = $data->nama_ruang;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Pembelian '.$nama_ruang.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Pembelian gagal '.$nama_ruang.' dihapus');
        }
    }

}
