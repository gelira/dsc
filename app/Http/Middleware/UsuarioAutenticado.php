<?php

namespace App\Http\Middleware;

use Closure;

class UsuarioAutenticado
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
        if (!session()->has('usuario'))
        {
            session()->flash('message', 'Você precisa se autenticar para acessar essa página');
            session()->flash('message-type', 'alert-warning');
            return redirect()->route('home');
        }
        return $next($request);
    }
}
