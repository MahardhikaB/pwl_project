<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodi')->insert([
            [
                'prodi_id' => 1,
                'nama_prodi' => 'D4 TI',
            ],
            [
                'prodi_id' => 2,
                'nama_prodi' => 'D4 SIB',
            ]
        ]);
    }
}
