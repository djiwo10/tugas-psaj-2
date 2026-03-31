<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ================= RELATION =================
    public function hasilKuis()
    {
        return $this->hasMany(HasilKuis::class, 'pengguna_id');
    }

    // ================= ROLE =================
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // ================= FILAMENT v3 =================
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    public function riwayat()
{
    return $this->hasMany(\App\Models\ProgressMateri::class, 'user_id');
}

public function schedules()
{
return $this->hasMany(Schedule::class);
}
}
