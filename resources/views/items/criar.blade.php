@extends('template')

@section('titulo')
    Inserir item na lista de {{ $usuario->login }}
@endsection

@section('conteudo')
    <h3>Inserir item na lista de compras de {{ $usuario->login }}</h3>
    <hr>
    <form action="{{ route('add') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="item[nome]" id="nome" required="required"
                value="{{ old('item.nome') }}" placeholder="Nome do produto" 
                class="form-control">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="item[quantidade]" id="quantidade"
                        value="{{ old('item.quantidade') }}" class="form-control"
                        required="required" placeholder="Quantidade de produtos">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" name="item[preco]" id="preco" step="0.01"
                        value="{{ old('item.preco') }}" class="form-control"
                        required="required" placeholder="Preço dos produtos">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Inserir</button>
    </form>
@endsection