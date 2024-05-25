<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPemakaian;
use App\Exports\ExportPemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class DataPemakaianController extends Controller
{
    public function datapemakaian(Request $request)
    {
        $data = DataPemakaian::all();
        return view('datapemakaian/datapemakaian',compact('data'),[
        ]);
    }

    public function create(Request $request)
    {
        $barangs = DataBarang::all();
        return view('datapemakaian/datapemakaianadd',[
            'barangs' => $barangs,
        ]);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
   
            
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        
            $data['kode_barang']            = $request->kode_barang;
            $data['jumlah_pakai']           = $request->jumlah_pakai;
            $data['tanggal_pemakaian']      = $request->tanggal_pemakaian;
            $data['pemakaian']              = $request->pemakaian;
            $data['keterangan']             = $request->keterangan;
            // dd($request->all());

        
        // create
        if($datapemakaian = DataPemakaian::create($data)){
                // Update atau buat data barang
                $cekbarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
                if ($cekbarang) {
                    // Jika barang sudah ada, update jumlah
                    $cekbarang->jumlah -= $request->jumlah_pakai;
                    $cekbarang->save();
                }

            return redirect()->route('datapemakaian')->with('success', 'Data Pembelian berhasil ditambahkan');
        }else{
            return redirect()->route('datapemakaianadd')->with('fail', 'Data Pembelian gagal ditambahkan');
        }
    }

    public function edit(string $id)
    {
        $barangs = DataBarang::all();
        $data = DataPemakaian::findOrFail($id);
        return view('datapemakaian/datapemakaianedit',[
            'data' => $data,
            'barangs' => $barangs,
        ]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[        
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = DataPemakaian::find($id);
        $data->kode_barang       = $request->kode_barang;
        $data->jumlah_pakai      = $request->jumlah_pakai;
        $data->tanggal_pemakaian = $request->tanggal_pemakaian;
        $data->pemakaian         = $request->pemakaian;
        $data->keterangan        = $request->keterangan;
        // dd($request->all());

        if($data->save()){
            $databarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
            if ($databarang) {
                // Jika jumlah barang bisa berubah
                $databarang->jumlah -= $data->jumlah_pakai; // Perbarui jumlah dengan selisih jumlah baru dan lama
                $databarang->save();
            }

            return redirect()->route('datapembelian')->with('success-update', 'Data Pembelian berhasil diedit');        
        }
        else{
            return redirect()->route('datapembelianedit')->with('fail', 'Data Pembelian gagal diedit');
        }
    }

    public function export(){
        return Excel::download(new ExportPemakaian, "datapemakaian.xlsx");
    }

    public function destroy($id)
    {
        //
        $data = DataPemakaian::findOrFail($id);
        $jumlahpem = $data->jumlah_pakai;
        $kodebar = $data->kode_barang;
        $databar = DataBarang::where('kode_barang', $kodebar)->first();
        $databar->jumlah += $jumlahpem;
        $databar->save();
        $kode_barang = $data->id;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Pembelian '.$kode_barang.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Pembelian gagal '.$kode_barang.' dihapus');
        }
    }
}
