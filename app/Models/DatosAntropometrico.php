<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosAntropometrico extends Model
{
    use HasFactory;

    public $fillable = [
        "altura",
        "peso",
        "sexo",
        "imc",
        "paciente_id",
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

}
