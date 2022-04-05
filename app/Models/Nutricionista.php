<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricionista extends Model
{
    use HasFactory;
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
