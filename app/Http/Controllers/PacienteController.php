<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;

class PacienteController extends Controller
{
   
    public function index()
    {
        $pacientes = Paciente::all();

      foreach($pacientes as $key => $paciente)
    {
        // $cant = $paciente->dato_antropometrico;
       
    //     $imcs = collect();
    //    $data =  $paciente->dato_antropometrico->last();
    //    $coleccion = collect($data);
    // $arrayimcs = array();
    $imcs = collect();
    $cant = count($paciente->dato_antropometrico);//longitud de la collecion-> ultima posicion
    // dd($paciente->dato_antropometrico);  
    // print($cant);
    foreach($paciente->dato_antropometrico as $key => $dato)
        {
            // print($dato);
          
            if($key+1 == $cant){
                
               $res = $dato->peso/($dato->altura*$dato->altura);
               print("           ".$res);
            $imcs->push($res);
                $res = 0;
            }
      
        }
       
    }
    dd($imcs[1]);
    // print($imcs);
    dd("hola");
    

        return view('admin.paciente.index',compact('pacientes','imcs'));
    }

    
    public function create()
    {
        return view('admin.paciente.create');
    }

    public function eliminarPaciente($id)
    {
        Paciente::destroy($id);
        return back();
    }

    public function actualizarPaciente(Request $request){
        // dd($request);
        $paciente = Paciente::find($request->idpaciente);
        $pass=$paciente->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $paciente->update([
            "name"=>$request->name,
            "apellido"=>$request->apellido,
            "email"=>$request->email,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "password"=>$pass,
            "tipo_diabetes"=>$request->tipo_diabetes,
        ]);
        return back();
    }

    public function store(Request $request)
    {
        // dd($request);
        $pass = Hash::make($request->password);
        $paciente = Paciente::create([
            "nombre"=>$request->nombre,
            "email"=>$request->email,
            "password"=>$pass,
            "telefono"=>$request->telefono,
            "cedula"=>$request->cedula,
            "apellido"=>$request->apellido,
            "tipo_diabetes"=>$request->tipo_diabetes,
            "edad"=>$request->edad
        ]);
        $paciente->assignRole('Cliente');
        $id_paciente = $paciente->id;
        
        // dd($id_paciente);
        return view('admin.paciente.datosAntropometricos',compact('paciente'));
    }

    public function guardarDatosAntropometricos(Request $request)
    {
        $paciente = Paciente::find($request->id_paciente);

        $paciente->dato_antropometrico()->create([
            "altura"=>$request->altura,
            "peso"=>$request->peso,
            "sexo"=>$request->sexo,
            "paciente_id"=>$request->id_paciente,
        ]);

        dd($paciente);

       
        return redirect()->route('paciente.index');
    }

    
    public function show(Paciente $paciente)
    {
        //
    }

   
    public function edit(Paciente $paciente)
    {
        //
    }

   
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        //
    }

    
    public function destroy(Paciente $paciente)
    {
        //
    }
}
