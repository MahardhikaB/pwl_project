<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraan')->insert([
            [
            'nopol' => 'AG 9042 PO',
            'merek' => 'Toyota',
            'jenis' => 'Avanza',
            'tahun_buat' => 2010,
            'warna' => 'Putih',
            ],
            [
            'nopol' => 'AE 4692 UN',
            'merek' => 'Toyota',
            'jenis' => 'Veloz',
            'tahun_buat' => 2019,
            'warna' => 'Putih',
            ],
            [
            'nopol' => 'N 6254 UWU',
            'merek' => 'Yamaha',
            'jenis' => 'Nmax',
            'tahun_buat' => 2019,
            'warna' => 'Hitam'
            ]
        ]);

    }
}
