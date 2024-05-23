<?php

namespace Database\Seeders;

use App\Models\DataPembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DataPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Mesin Bor',
            'kode_barang' => 'K001',
            'jenis_barang' => 'Alat',
            'merk' => 'makita',
            'tanggal_pembelian' => Carbon::create(2024, 3, 12),
            'jumlah' => '10',
            'harga' => '120000',
            'total' => '1200000'

        ]);
        $seed2 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Mesin Las',
            'kode_barang' => 'K002',
            'jenis_barang' => 'Alat',
            'merk' => 'makita',
            'tanggal_pembelian' => Carbon::create(2024, 4, 12),
            'Jumlah' => '15',
            'harga' => '150000',
            'total' => '2250000'
        ]);
    }
}
