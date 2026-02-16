<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    // 👇 WAJIB karena nama tabel tidak plural
    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'mata_pelajaran_id');
    }

    public function kuis()
    {
        return $this->hasMany(Kuis::class, 'mata_pelajaran_id');
    }
}
