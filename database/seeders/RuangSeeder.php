<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed1 = Ruang::updateOrCreate([
            'nama_ruang' => 'Gedung A',
        ]);    
        $seed2 = Ruang::updateOrCreate([
            'nama_ruang' => 'Gedung B',
        ]);    
    }
}
