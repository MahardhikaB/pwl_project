<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
        [
            'nama' => 'Alm. Mahardhika Gatot Santoso',
            'relasi' => 'Bapak'
        ],
        [
            'nama' => 'Romdiyah',
            'relasi' => 'Ibu'
        ],
        [
            'nama' => 'Risky Eka Prasetiya',
            'relasi' => 'Kakak'
        ]
        ]);
    }
}
