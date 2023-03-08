<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobi')->insert([
        [
            'nama_hobi' => 'Bermain Game',
            'alasan' => 'Karena saya suka bermain game'
        ],
        [
            'nama_hobi' => 'Bermain Uno',
            'alasan' => 'Karena saya suka Uno'
        ],
        [
            'nama_hobi' => 'Menonton Anime',
            'alasan' => 'Karena saya suka anime'
        ]
        ]);
    }
}
