<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdiModel extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'prodi_id';
    protected $fillable = [
        'prodi_id',
        'nama_prodi',
    ];
    /**
     * Get the user associated with the ProdiModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mahasiswa()
    {
        return $this->hasOne(MahasiswaModel::class, 'prodi_id', 'prodi_id');
    }
}
