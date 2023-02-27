<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = [
            'nama' => 'Mahardhika Bredy Dwi G.S',
            'nim' => '2141720112',
            'kelas' => 'TI-2B'
        ];
        return view('pertemuan3.praktikum2.profile')
            ->with('data', $data);
    }
}
