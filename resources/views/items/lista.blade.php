@extends('template')

@section('titulo')
    Itens de {{ $usuario->login }}
@endsection

@section('conteudo')
    <h3>Lista de itens de {{ $usuario->login }}</h3>
    <hr>
    @if ($items->isEmpty())
        <p>Nenhum item encontrado.</p>
    @else
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $i)
                    <tr>
                        <td>{{ $i->nome }}</td>
                        <td>{{ $i->quantidade }}</td>
                        <td>{{ $i->preco }}</td>
                        <td>{{ $i->created_at->format('H:i:s d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('remover', ['id' => $i->id]) }}" class="btn btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a class="btn btn-primary" href="{{ route('criarItem') }}">Inserir novo item</a>
@endsection