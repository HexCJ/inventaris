<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = Inventaris::updateOrCreate([
            'kode_barang' => 'K001',
            'jenis_barang' => 'Alat',
            'Jumlah' => '10',
            // 'tanggal_pembelian' => '2024-03-12',
            // 'tanggal_pemakaian' => '2024-03-20',
            'tanggal_pembelian' => Carbon::create(2024, 3, 12),
            'tanggal_pemakaian' => Carbon::create(2024, 3, 20),
            'penggunaan' => '2',
            'ruang' => 'Ruang 1',
            'keterangan' => 'digunakan',
        ]);
        $seed2 = Inventaris::updateOrCreate([
            'kode_barang' => 'K002',
            'jenis_barang' => 'Alat',
            'Jumlah' => '15',
            // 'tanggal_pembelian' => '2024-04-12',
            // 'tanggal_pemakaian' => '2024-04-20',
            'tanggal_pembelian' => Carbon::create(2024, 4, 12),
            'tanggal_pemakaian' => Carbon::create(2024, 4, 20),
            'penggunaan' => '2',
            'ruang' => 'Ruang 2',
            'keterangan' => 'tersisah',
        ]);
    }
}
