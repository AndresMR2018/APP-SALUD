<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nutricionista extends Model
{
    use HasFactory , HasRoles;
    protected $guard_name = 'web';
    
    public $fillable = [
        "nombre",
        "apellido",
        "cedula",
        "telefono",
        "correo",
        "password",
        "especialidad",
    ];

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
