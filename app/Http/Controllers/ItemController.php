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

    public function removerItem(Request $rq, $id)
    {
        $u = $rq->session()->get('usuario');
        $i = Item::find($id);

        if ($i == null)
        {
            $rq->session()->flash('message', 'Item não encontrado');
            $rq->session()->flash('message-type', 'alert-danger');
        }

        else
        {
            if ($i->usuario->id != $u->id)
            {
                $rq->session()->flash('message', 'Você não tem permissão de remover esse item');
                $rq->session()->flash('message-type', 'alert-danger');
            }

            else 
            {
                $rq->session()->flash('message', 'Item removido com sucesso');
                $rq->session()->flash('message-type', 'alert-success');
                $i->delete();
            }
        }

        return redirect()->route('listar');
    }
}
