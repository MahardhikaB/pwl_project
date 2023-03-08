<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index () {
        $keluarga = KeluargaModel::all();
        return view('pertemuan4.keluarga') -> with('keluarga', $keluarga);
    }
}
