<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'jk', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'hp'];
    /**
     * Get the user associated with the MahasiswaModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prodi()
    {
        return $this->hasOne(ProdiModel::class, 'prodi_id', 'prodi_id');
    }
}
