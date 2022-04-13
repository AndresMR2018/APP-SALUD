<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
   
    public function index()
    {
        //
    }

    public function dashboard(){
        return view('client.dashboard');
    }


    
    public function miCuenta()
    {
    
        $paciente = Paciente::find(Auth::id());
        // dd($paciente);
        return view('client.cuenta',compact('paciente'));
    }
 
    public function create()
    {
        //
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
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
