<?php

namespace Database\Seeders;

use App\Models\DataPemakaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DataPemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPemakaian::updateOrCreate([
            // 'nama_barang' => 'Mesin Bor',
            'kode_barang' => 'K001',
            'jumlah_pakai' => '2',
            'tanggal_pemakaian' => Carbon::create(2024, 3, 20),
            'pemakaian' => 'membor tembok',
            'keterangan' => 'digunakan',

        ]);
        $seed2 = DataPemakaian::updateOrCreate([
            // 'nama_barang' => 'Mesin Las',
            'kode_barang' => 'K002',
            'jumlah_pakai' => '2',
            'tanggal_pemakaian' => Carbon::create(2024, 3, 20),
            'pemakaian' => 'mengelas besi',
            'keterangan' => 'tersisah',

        ]);
    }
}
