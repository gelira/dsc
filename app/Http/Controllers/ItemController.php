<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CriarItemRequest;
use App\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticado');    
    }

    public function listar(Request $rq)
    {
        $u = $rq->session()->get('usuario');
        $i = $u->items()->get();
        return view('items.lista', ['usuario' => $u, 'items' => $i]);
    }

    public function criarItem(Request $rq)
    {
        return view('items.criar', ['usuario' => $rq->session()->get('usuario')]);
    }

    public function add(CriarItemRequest $rq)
    {
        $u = $rq->session()->get('usuario');
        $u->items()->save(new Item($rq->item));
        return redirect()->route('listar');
    }
}
