@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Serviços</h1>

        <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Criar Novo Serviço</a>

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
                    <th scope = "col">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($servicos as $servico)
                    <tr>
                        <td>{{ $servico->id }}</td>
                        <td>{{ $servico->nome }}</td>
                        <td>{{ $servico->descricao }}</td>
                        <td>{{ $servico->formatted_preco }}</td> 
                        <td>
                            <a href="{{ route('servicos.show', $servico->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection