<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory , HasRoles;

    public $fillable = [
        "email",
        "password",
    ];
    protected $guard_name = 'web';
}
