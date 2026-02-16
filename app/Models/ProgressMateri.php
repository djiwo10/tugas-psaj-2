<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Materi;

class ProgressMateri extends Model
{
     protected $table = 'progress_materi';
     protected $casts = [
    'updated_at' => 'datetime',
];

    protected $fillable = ['user_id', 'materi_id', 'status'];
    
    public function materi()
{
    return $this->belongsTo(Materi::class, 'materi_id');
}

}

