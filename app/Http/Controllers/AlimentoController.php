<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlimentoRequest;
use App\Http\Requests\UpdateAlimentoRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AlimentoController extends Controller
{
  
    public function index()
    {
        $alimentos = Alimento::all();
            return view('admin.alimentos.index',compact('alimentos'));
    }

   
    public function create()
    {
       
        return view('admin.alimentos.create');
    }

   
    public function store(Request $request)
    {

        //validar
        
        $alimento = Alimento::create([
            "nombre"=>$request->nombre,
            "peso"=>$request->peso,
            "valor_calorico"=>$request->valor_calorico,
            "carbohidrato"=>$request->carbohidrato,
            "proteina"=>$request->proteina,
            "grasa"=>$request->grasa,
        ]);

        if ($request->hasFile('foto')){
            
            $url = "";
            $file = $request->foto;
            $elemento = Cloudinary::upload($file->getRealPath(), ['folder' => 'alimento']);
            // dd($elemento);
            $public_id = $elemento->getPublicId();
            $url = $elemento->getSecurePath();
        }

        $alimento->imagen()->create([
            "url" => $url,
            "public_id" => $public_id
        ]);

        return back();
    }

   
    public function show(Alimento $alimento)
    {
       
    }

   
    public function edit(Alimento $alimento)
    {
       
    }

    
    public function update(UpdateAlimentoRequest $request, Alimento $alimento)
    {
        
    }

   
    public function destroy(Alimento $alimento)
    {
    
    }
}
