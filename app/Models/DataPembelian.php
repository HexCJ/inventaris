<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembelian extends Model
{
    use HasFactory;

    protected $table = 'data_pembelian';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'jenis_barang',
        'merk',
        'tanggal_pembelian',
        'jumlah',
        'harga',
        'total',
    ];


}
