<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPembelian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPembelian;
use Illuminate\Support\Facades\Validator;


class DataPembelianController extends Controller
{
    public function datapembelian(Request $request)
    {
        $data = DataPembelian::all();
        return view('datapembelian/datapembelian',compact('data'),[
        ]);
    }

    public function create(Request $request)
    {
        $barangs = DataBarang::all();
        return view('datapembelian/datapembelianadd',[
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
        
            $data['nama_barang']            = $request->nama_barang;
            $data['kode_barang']            = $request->kode_barang;
            $data['jenis_barang']           = $request->jenis_barang;
            $data['merk']                   = $request->merk;
            $data['jumlah']                 = $request->jumlah;
            $data['tanggal_pembelian']      = $request->tanggal_pembelian;
            $data['harga']                  = $request->harga;
            $data['total']                  = $request->jumlah * $request->harga;

        
        // create
        if($datapembelian = DataPembelian::create($data)){
            // $databarang = DataBarang::create([
            //     'kode_barang' => $request->kode_barang,
            //     'nama_barang' => $request->nama_barang,
            //     'jenis_barang' => $request->jenis_barang,
            //     'jumlah' => $request->jumlah,
            //     'harga' => $request->harga,
            // ]);

                // Update atau buat data barang
                $cekbarang = DataBarang::where('kode_barang', $request->kode_barang)->first();

                if ($cekbarang) {
                    // Jika barang sudah ada, update jumlah
                    $cekbarang->jumlah += $request->jumlah;
                    $cekbarang->save();
                } else {
                    // Jika barang belum ada, buat baru
                    $newItem = DataBarang::create([
                    'kode_barang' => $request->kode_barang,
                    'nama_barang' => $request->nama_barang,
                    'jenis_barang' => $request->jenis_barang,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga,
                    ]);
                }

            return redirect()->route('datapembelian')->with('success', 'Data Pembelian berhasil ditambahkan');
        }else{
            return redirect()->route('datapembelian')->with('fail', 'Data Pembelian gagal ditambahkan');
        }
    }

    public function edit(string $id)
    {
        $barangs = DataBarang::all();
        $data = DataPembelian::findOrFail($id);
        return view('datapembelian/datapembelianedit',[
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
        $data = DataPembelian::find($id);
        $jumlahLama = $data->jumlah;
        $data->nama_barang       = $request->nama_barang;
        $data->kode_barang       = $request->kode_barang;
        $data->jenis_barang      = $request->jenis_barang;
        $data->merk              = $request->merk;
        $data->jumlah            = $request->jumlah;
        $data->tanggal_pembelian = $request->tanggal_pembelian;
        $data->harga             = $request->harga;
        $data->total             = $request->jumlah * $request->harga;

        if($data->save()){

            $databarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
            if ($databarang) {

                // if($databarang->jumlah >= $data->jumlah){

                // }else if($databarang->jumlah >= $data->jumlah){

                // }
                $selisihJumlah = $request->jumlah - $jumlahLama;
                $databarang->nama_barang = $data->nama_barang;
                $databarang->jenis_barang = $data->jenis_barang;
                $databarang->harga = $data->harga;
                // Jika jumlah barang bisa berubah
                // $databarang->jumlah += $data->jumlah; // Perbarui jumlah dengan selisih jumlah baru dan lama
                     $databarang->jumlah += $selisihJumlah;
                $databarang->save();
            }

            return redirect()->route('datapembelian')->with('success-update', 'Data Pembelian berhasil diedit');        
        }
        else{
            return redirect()->route('datapembelianedit')->with('fail', 'Data Pembelian gagal diedit');
        }
    }

    public function export(){
        return Excel::download(new ExportPembelian, "datapembelian.xlsx");
    }

    public function destroy($id)
    {
        //
        $data = DataPembelian::findOrFail($id);
        $nama_barang = $data->id;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Pembelian '.$nama_barang.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Pembelian gagal '.$nama_barang.' dihapus');
        }
    }
}
