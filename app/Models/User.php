<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'nama_lengkap',
        'password',
        'first_password',
        'class_id',
        'role',
        'has_voted',
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
            'has_voted' => 'boolean',
        ];
    }

    public function class_relation()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPemilih()
    {
        return $this->role === 'pemilih';
    }
}