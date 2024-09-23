@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Produtos</h1>

        <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Criar Novo Produto</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">ID</th>
                    <th scope = "col">Nome</th>
                    <th scope = "col">Descrição</th>
                    <th scope = "col">Preço</th>
                    <th scope = "col">Estoque</th>
                    <th scope = "col">Fornecedor</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->formatted_preco }}</td>
                        <td>{{ $produto->estoque }}</td>
                        <td>{{ $produto->fornecedor->nome }}</td>
                        <td>
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection