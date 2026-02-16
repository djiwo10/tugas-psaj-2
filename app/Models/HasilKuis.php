<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    protected $table = 'hasil_kuis';

    protected $fillable = [
        'pengguna_id',
        'kuis_id',
        'nilai',
        'selesai_pada',
    ];

    protected $casts = [
    'selesai_pada' => 'datetime',
    ];
    
    public function getSelesaiPadaFormatAttribute()
    {
    return $this->selesai_pada
        ? $this->selesai_pada->format('d M Y H:i')
        : '-';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }
}
