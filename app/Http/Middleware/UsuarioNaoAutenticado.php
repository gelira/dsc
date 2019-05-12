<?php

namespace App\Http\Middleware;

use Closure;

class UsuarioNaoAutenticado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('usuario'))
        {
            return redirect()->route('listar');
        }
        return $next($request);
    }
}
