<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama', 'kelas_id', 'jk', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'hp'];
    /**
     * Get the user associated with the MahasiswaModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prodi()
    {
        return $this->hasOne(ProdiModel::class, 'prodi_id', 'prodi_id');
    }

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class);
    }

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliahModel::class);
    }
}
