<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPemakaian;
use App\Exports\ExportPemakaian;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class DataPemakaianController extends Controller
{
    public function datapemakaian(Request $request)
    {
        // $data = DataPemakaian::all();

        $data = DataPemakaian::join('data_barang', 'data_barang.kode_barang', '=', 'data_pemakaian.kode_barang')
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


        return view('datapemakaian/datapemakaian',compact('data'),[
        ]);
    }

    public function create(Request $request)
    {
        $barangs = DataBarang::all();
        $ruangs = Ruang::all();
        $users = User::all();
        return view('datapemakaian/datapemakaianadd',[
            'ruangs' => $ruangs,
            'barangs' => $barangs,
            'users' => $users,
        ]);
    }

    // public function store(Request $request)
    // {
    //     //
    //     $validator = Validator::make($request->all(),[
   
            
    //     ]);
    //     //jika valid gagal
    //     if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
    //     //terima dan kirim
        
    //         $data['kode_barang']            = $request->kode_barang;
    //         $data['jumlah_pakai']           = $request->jumlah_pakai;
    //         $data['tanggal_pemakaian']      = $request->tanggal_pemakaian;
    //         $data['pemakaian']              = $request->pemakaian;
    //         $data['keterangan']             = $request->keterangan;
    //         // dd($request->all());

        
    //     // create
    //     if($datapemakaian = DataPemakaian::create($data)){
    //             // Update atau buat data barang
    //             $cekbarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
    //             if ($cekbarang) {
    //                 // Jika barang sudah ada, update jumlah
    //                 $cekbarang->jumlah -= $request->jumlah_pakai;
    //                 $cekbarang->save();
    //             }

    //         return redirect()->route('datapemakaian')->with('success', 'Data Pembelian berhasil ditambahkan');
    //     }else{
    //         return redirect()->route('datapemakaianadd')->with('fail', 'Data Pembelian gagal ditambahkan');
    //     }
    // }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(),[
        // Tambahkan aturan validasi yang diperlukan
    ]);

    // Jika validasi gagal
    if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    // Terima dan kirim data
    $data['kode_barang']            = $request->kode_barang;
    $data['jumlah_pakai']           = $request->jumlah_pakai;
    $data['tanggal_pemakaian']      = $request->tanggal_pemakaian;
    $data['pemakai']                = $request->pemakai;
    $data['ruang']                  = $request->ruang;
    $data['keterangan']             = $request->keterangan;

    // Cek stok barang
    $cekbarang = DataBarang::where('kode_barang', $request->kode_barang)->first();
    if ($cekbarang) {
        // Jika barang ada, cek jumlah stok
        if ($cekbarang->jumlah < $request->jumlah_pakai) {
            return redirect()->back()->withInput()->with('fail', 'Maaf jumlah barang yang anda pilih tidak cukup');
        }

        // Jika stok cukup, kurangi jumlah barang
        $cekbarang->jumlah -= $request->jumlah_pakai;
        $cekbarang->save();
    } else {
        return redirect()->back()->withInput()->with('fail', 'Barang tidak ditemukan');
    }

    // Buat data pemakaian
    if($datapemakaian = DataPemakaian::create($data)){
        return redirect()->route('datapemakaian')->with('success', 'Data Pemakaian berhasil ditambahkan');
    }else{
        return redirect()->route('datapemakaianadd')->with('fail', 'Data Pemakaian gagal ditambahkan');
    }
}


    public function edit(string $id)
    {
        $barangs = DataBarang::all();
        $ruangs = Ruang::all();
        $data = DataPemakaian::findOrFail($id);
        $users = User::all();
        return view('datapemakaian/datapemakaianedit',[
            'data' => $data,
            'ruangs' => $ruangs,
            'barangs' => $barangs,
            'users' => $users,
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
        $data->kode_barang       = $data->kode_barang;
        // $data->jumlah_pakai      = $request->jumlah_pakai;
        $data->tanggal_pemakaian = $request->tanggal_pemakaian;
        $data->pemakai           = $request->pemakai;
        $data->ruang             = $request->ruang;
        $data->keterangan        = $request->keterangan;
        // dd($request->all());

        if($data->save()){
            $databarang = DataBarang::where('kode_barang', $data->kode_barang)->first();
            if ($databarang) {
                // Jika jumlah barang bisa berubah
                $databarang->jumlah -= $data->jumlah_pakai; // Perbarui jumlah dengan selisih jumlah baru dan lama
                $databarang->save();
            }

            return redirect()->route('datapemakaian')->with('success-update', 'Data pemakaian berhasil diedit');        
        }
        else{
            return redirect()->route('datapemakaianedit')->with('fail', 'Data pemakaian gagal diedit');
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
        $kode_barang = $data->kode_barang;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Pembelian '.$kode_barang.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Pembelian gagal '.$kode_barang.' dihapus');
        }
    }
}
