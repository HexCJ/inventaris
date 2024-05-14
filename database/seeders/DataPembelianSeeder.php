<?php

namespace Database\Seeders;

use App\Models\DataPembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Mesin Bor',
            'merk' => 'makita',
            'jumlah' => '10',
            'harga' => '120000',
            'total' => '120000'

        ]);
        $seed2 = DataPembelian::updateOrCreate([
            'nama_barang' => 'Mesin Las',
            'merk' => 'makita',
            'Jumlah' => '15',
            'harga' => '150000',
            'total' => '2250000'
        ]);
    }
}
