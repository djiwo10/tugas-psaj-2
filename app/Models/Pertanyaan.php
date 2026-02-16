<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    protected $fillable = [
        'kuis_id',
        'pertanyaan',
    ];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    public function pilihanJawaban()
    {
        return $this->hasMany(PilihanJawaban::class, 'pertanyaan_id');
    }
}
