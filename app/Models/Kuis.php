<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;

class Kuis extends Model
{
    protected $table = 'kuis';

    protected $fillable = [
        'mata_pelajaran_id',
        'judul',
        'deskripsi',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'kuis_id');
    }

    public function hasilKuis()
    {
        return $this->hasMany(HasilKuis::class, 'kuis_id');
    }
}
