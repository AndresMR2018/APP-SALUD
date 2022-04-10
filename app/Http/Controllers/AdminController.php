<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::destroy($id);
        return back();
    }
}
