<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        // dd("hola");
        if(auth()->user()){
            dd(auth()->user());
        }else{
            dd("16");
        }
         //si esta iniciado sesion y tiene el rol de admin entonces de paso a la ruta que busca
         if( auth()->check()   )
            return $next($request);
        
            //sino redirigir a login
        return redirect()->route('login');
    }
}
