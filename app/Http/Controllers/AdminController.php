<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   
    // public function index()
    // {
    //     $admins = User::
    //    return view('admin.administradores.index',compact('admins'));
    // }

    public function listarPacientes()
    {
        dd("holii");
        $pacientes = User::role('Cliente')->get();
        return view('admin.paciente.index',compact('pacientes'));
    }

    public function formCuenta()
    {
        $administrador =Admin::find(Auth::id());
        return view('admin.cuenta.editarCuenta',compact('administrador'));
    }

    public function updateCuenta(Request $request)
    {
        $hashpass = Hash::make($request->password);
       $user = User::find(Auth::id());
       
       if($request->password!=null)
            $user->update(["password"=>$hashpass]);

       return back();
    }

    public function miCuenta(){
        $administrador =Admin::find(Auth::id());
        // dd($administrador);

        return view('admin.cuenta.cuenta',compact('administrador'));
    }

  

   

    public function dashboard()
    {
        return view('admin.dashboard');
    }

   

    public function listar(){
        $admins = User::role('Administrador')->get();
        return view('admin.administradores.index',compact('admins'));
    }

  
    public function create()
    {
        
        return view('admin.administradores.create');
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        // dd($request,$id);
        $administrador = User::find($id);
        $pass=$administrador->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $administrador->update([
            "name"=>$request->name,
            "apellido"=>$request->apellido,
            "email"=>$request->email,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "password"=>$pass
        ]);
        return back();
    }

    
    public function destroy($id)
    {
        
        User::destroy($id);
        return back();
    }
}
