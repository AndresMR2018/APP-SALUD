<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreNutricionistaRequest;
use App\Http\Requests\UpdateNutricionistaRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class NutricionistaController extends Controller
{
    
    //listar todos los nutri
    public function index()
    {
        $nutricionistas = Nutricionista::all();

        return view('admin.nutricionistas.index',compact('nutricionistas'));
    }

    public function dashboard(){
        return view('nutri.dashboard');
    }


     //traer el form de creacion
    public function create()
    {
        //
        return view('admin.nutricionistas.create');
    }

   
    public function store(Request $request)
    {
        // dd($request);
        $hashpass = Hash::make($request->password);
        $nutricionista = Nutricionista::create([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "correo"=>$request->correo,
            "password"=>$hashpass,
            "especialidad"=>$request->especialidad
        ]);

        
        if ($request->hasFile('imagen')) {
            $url = "";
            $file = $request->imagen;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'nutricionista']);
            // dd($elemento);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
        }

        $nutricionista->imagen()->create([
            "url" => $url,
            "public_id" => $public_id
        ]);



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */
    public function show(Nutricionista $nutricionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Nutricionista $nutricionista)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $nutricionista = Nutricionista::find($id);
        $pass=$nutricionista->password;
        if($request->password)
            $pass = Hash::make($request->password);

        $nutricionista->update([
            "nombre"=>$request->nombre,
            "apellido"=>$request->apellido,
            "correo"=>$request->correo,
            "cedula"=>$request->cedula,
            "telefono"=>$request->telefono,
            "password"=>$pass
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nutricionista  $nutricionista
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Nutricionista::destroy($id);
        return back();
    }
}
