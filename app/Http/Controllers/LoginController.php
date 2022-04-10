<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Nutricionista;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   

   


    public function login(Request $request)
    {
        
        $user = User::where('email',$request->email)->first();
    // dd($user);
    //erik
        if(isset($user) && !empty($user)){
           
            Auth::login($user->administradores());
            return redirect()->route('home');
        }else{
            return back();
        }
        // $paciente = Paciente::where('email',$request->email)->first();
        // $admin  =  Admin::where('email',$request->email)->first();
        // $nutri = Nutricionista::where('email',$request->email)->first();
        
        // if($paciente!= null){
        //     Auth::
        //     dd($paciente);
        // }else{
            
        //     if($admin!=null){
        //         dd($admin);
        //     }else
        //         if($nutri!=null)
        //             dd($nutri);
        //             else
        //                 dd("usuario no registrado en la base de datos");
            
        // }

   
    }

}
