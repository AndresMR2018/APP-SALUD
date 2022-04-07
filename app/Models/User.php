<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


  
    protected $fillable = [
        'name',
        'email',
        'password',
        "cedula",
        "apellido",
        "telefono",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

    public function administradores()
    {
        return $this->hasMany(Admin::class);
    }

    public function nutricionistas()
    {
        return $this->hasMany(Nutricionista::class);
    }
}
