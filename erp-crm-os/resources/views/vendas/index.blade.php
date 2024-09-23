@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Vendas</h1>

        <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Criar Nova Venda</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope = "col">ID</th>
                    <th scope = "col">Cliente</th>
                    <th scope = "col">Funcionário</th>
                    <th scope = "col">Valor Total</th>
                    <th scope = "col">Data da Venda</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($vendas as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->funcionario->nome }}</td>
                        <td>{{ $venda->formatted_total_amount }}</td>
                        <td>{{ $venda->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('vendas.show', $venda->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
