<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function listar(Request $rq)
    {
        $u = $rq->session()->get('usuario');
        $login = $u->login;
        return "Login do usuário $login efetuado com sucesso";
    }
}
