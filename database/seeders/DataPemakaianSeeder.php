<?php

namespace Database\Seeders;

use App\Models\DataPemakaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPemakaian::updateOrCreate([
            'nama_barang' => 'Mesin Bor',
            'jumlah_pakai' => '2',
            'tanggal_pakai' => '2024-03-20',
            'pemakaian' => 'membor tembok',
            'keterangan' => 'digunakan',

        ]);
        $seed2 = DataPemakaian::updateOrCreate([
            'nama_barang' => 'Mesin Las',
            'jumlah_pakai' => '2',
            'tanggal_pakai' => '2024-04-20',
            'pemakaian' => 'mengelas besi',
            'keterangan' => 'tersisah',

        ]);
    }
}
