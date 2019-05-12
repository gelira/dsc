<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CriarUsuarioRequest;
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
}
