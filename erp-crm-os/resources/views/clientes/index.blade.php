@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Clientes</h1>

        <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Criar Novo Cliente</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead class = "table-success">
                <tr>
                    <th scope = "col">ID</th>
                    <th scope = "col">Nome</th>
                    <th scope = "col">Email</th>
                    <th scope = "col">Telefone</th>
                    <th scope = "col">Endereço</th>
                    <th scope = "col">Tipo</th>
                    <th scope = "col">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->fone }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->tipo }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
