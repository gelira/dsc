<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CriarUsuarioRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

class UsuarioController extends Controller
{
    public function criar(CriarUsuarioRequest $rq)
    {
        $u = $rq->usuario;
        $u['senha'] = Hash::make($u['senha']);
        Usuario::create($u);
        return redirect()->route('home');
    }

    public function entrar(LoginRequest $rq)
    {
        $u = Usuario::where('login', $rq->login)->first();
        if ($u != null)
        {
            if (Hash::check($rq->senha, $u->senha))
            {
                $rq->session()->put('usuario', $u);
                return redirect()->route('listar');
            }
        }

        $rq->session()->flash('message', 'Login e senha inválidos');
        $rq->session()->flash('message-type', 'alert-danger');

        return redirect()->route('home');
    }

    public function sair(Request $rq)
    {
        if ($rq->session()->has('usuario'))
        {
            $rq->session()->forget('usuario');
            $rq->session()->flash('message', 'Logout realizado com sucesso');
            $rq->session()->flash('message-type', 'alert-info');
        }
        return redirect()->route('home');
    }
}
