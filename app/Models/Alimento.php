<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;

    public $fillable = [
        "nombre",
        "peso",
        "valor_calorico",
        "carbohidrato",
        "proteina",
        "grasa",
    ];

    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
