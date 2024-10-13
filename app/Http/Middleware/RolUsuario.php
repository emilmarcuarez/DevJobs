<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
   
    public function handle(Request $request, Closure $next): Response
    {

        if($request->user()->rol === 1){
            // en caso de que no sea rol 2 redireccionar a home
            return redirect()->route('home');
        }
        return $next($request);
    }
}
