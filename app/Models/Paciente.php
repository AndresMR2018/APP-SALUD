<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';

    public $fillable=[
        "nombre",
        "apellido",
        "email",
        "password",
        "tipo_diabetes",
        "telefono",
        "cedula",
        "edad"
    ];

    public $timestamps = false;


    
    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }


    public function dato_antropometrico()
    {
        return $this->hasMany(DatosAntropometrico::class);
    }
}
