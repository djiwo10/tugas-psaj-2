<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'mata_pelajaran_id',
        'judul',
        'isi',
        'urutan',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function mapel()
{
    return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
}   

}
