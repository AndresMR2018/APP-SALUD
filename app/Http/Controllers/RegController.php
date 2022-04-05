<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
    //

    public function registrarAdmin(Request $request){
        $pass = Hash::make($request->password);
        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$pass,
            "telefono"=>$request->telefono,
            "cedula"=>$request->cedula,
            "apellido"=>$request->apellido
        ]);
        $user->assignRole('Administrador');
        return back();
    }

    public function registrarPaciente(Request $request)
    {
        dd($request);
        $pass = Hash::make($request->password);
        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$pass,
            "telefono"=>$request->telefono,
            "cedula"=>$request->cedula,
            "apellido"=>$request->apellido
        ]);
        $user->assignRole('Cliente');
        return back();
    }
}
