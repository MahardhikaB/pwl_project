<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatKulModel extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliahModel::class);
    }
}
