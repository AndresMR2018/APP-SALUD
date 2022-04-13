<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\DatosAntropometrico;

class PacienteController extends Controller
{
   
    public function index()
    {
        // $lastRecordDate = DatosAntropometrico::all()->sortByDesc('created_at')->take(1)->toArray();
        // dd($lastRecordDate);
        // $imcs = DB::table('datos_antropometricos')->select('imc')->latest()->get();
        // $sexos = DB::table('datos_antropometricos')->select('sexo')->latest()->get();
        // $alturas = DB::table('datos_antropometricos')->select('altura')->latest()->get();
        // $pesos = DB::table('datos_antropometricos')->select('peso')->latest()->get();
        // dd($alturas,$sexos,$pesos,$imcs);
        $pacientes = Paciente::all();

        return view('admin.paciente.index',compact('pacientes'));
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
        // dd($request);

       

        $paciente = Paciente::find($request->id_paciente);

        $paciente->dato_antropometrico()->create([
            "altura"=>$request->altura,
            "peso"=>$request->peso,
            "sexo"=>$request->sexo,
            "imc"=>$request->imc,
            "paciente_id"=>$request->id_paciente,
        ]);

        // dd($paciente);

       
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
